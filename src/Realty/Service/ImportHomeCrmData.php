<?php

declare(strict_types=1);

namespace App\Realty\Service;

use App\Entity\Realty\Category;
use App\Entity\Realty\Property;
use App\Entity\Realty\PropertyType;
use App\Entity\Realty\Type;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ImportHomeCrmData
{
    const HOME_CRM_DATA_XML = 'https://homecrm.ru/unloadings/152/1/xml/yandex/yandex.xml';

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(SerializerInterface $serializer, EntityManagerInterface $em)
    {
        $this->serializer = $serializer;
        $this->em = $em;
    }

    public function __invoke()
    {
        $xmlData = file_get_contents(self::HOME_CRM_DATA_XML);
        $encoder = new XmlEncoder();
        $arrayData = $encoder->decode($xmlData, 'xml');
        $realtyRepository = $this->em->getRepository(Property::class);
        foreach($arrayData['offer'] as $data){
            $existRealty = $realtyRepository->findOneBy(['code' => $data['@internal-id']]);

            $context = [ObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true];

            if($existRealty){
                $context = array_merge($context, [AbstractNormalizer::OBJECT_TO_POPULATE => $existRealty, AbstractObjectNormalizer::DEEP_OBJECT_TO_POPULATE => true]);
            }

            $realty = $this->serializer->denormalize($data, Property::class, null, $context);

            $type = $this->getTargetObject($data['type'], Type::class, 'typeName');
            $propertyType = $this->getTargetObject($data['property-type'], PropertyType::class, 'propertyTypeName');
            $category = $this->getTargetObject($data['category'], Category::class, 'categoryName');

            $realty->setType($type);
            $realty->setPropertyType($propertyType);
            $realty->setCategory($category);

            $this->em->persist($realty);

        }
        $this->em->flush();
        echo "<pre>";
        print_r($arrayData);
        echo "</pre>";


        return "ок";
    }

    private function getTargetObject($data, $class, $searchColumn){
        $targetObjectRepository = $this->em->getRepository($class);
        $targetObject = $targetObjectRepository->findOneBy([$searchColumn => $data]);

        if(!$targetObject){
            $targetObject = new $class($data);
            $this->em->persist($targetObject);
            $this->em->flush();
        }

        return $targetObject;
    }

}