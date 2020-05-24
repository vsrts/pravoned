<?php

declare(strict_types=1);

namespace App\Realty\Service;

use App\Entity\Realty\Agent;
use App\Entity\Realty\Category;
use App\Entity\Realty\Property;
use App\Entity\Realty\PropertyParams;
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

    public function importData()
    {
        $xmlData = file_get_contents(self::HOME_CRM_DATA_XML);
        $encoder = new XmlEncoder();
        $arrayData = $encoder->decode($xmlData, 'xml');

        foreach($arrayData['offer'] as $data){

            $data = $this->getBooleanFromString($data);

            $propertyContext = ['groups' => ['import_denormalize']];
            $realty = $this->getDenormalizedObject($data, Property::class, 'code', $data['@internal-id'], $propertyContext);

            $type = $this->getTargetObject($data['type'], Type::class, 'typeName');
            $propertyType = $this->getTargetObject($data['property-type'], PropertyType::class, 'propertyTypeName');
            $category = $this->getTargetObject($data['category'], Category::class, 'categoryName');
            $agent = $this->getDenormalizedObject($data['sales-agent'], Agent::class, 'name', $data['sales-agent']['name']);

            $propertyParamsContext = ['groups' => ['property_params']];
            $propertyParamsSearchData = ($realty->getPropertyParams()) ? $realty->getPropertyParams()->getId() : null;
            $propertyParams = $this->getDenormalizedObject($data, PropertyParams::class, 'id', $propertyParamsSearchData, $propertyParamsContext);

            $realty->setType($type);
            $realty->setPropertyType($propertyType);
            $realty->setCategory($category);
            $realty->setAgent($agent);
            $realty->setPropertyParams($propertyParams);

            if(array_key_exists('built-year', $data)){
                $realty->getPropertyParams()->setBuildYear((int)$data['built-year']['0']);
            }
            if(array_key_exists('area', $data)){
               $realty->getPropertyParams()->setArea((float)$data['area']['value']);
            }
            if(array_key_exists('living-space', $data)){
                $realty->getPropertyParams()->setLivingSpace((float)$data['living-space']['value']);
            }
            if(array_key_exists('kitchen-space', $data)){
                $realty->getPropertyParams()->setKitchenSpace((float)$data['kitchen-space']['value']);
            }

            $this->em->persist($realty);

        }

        $this->em->flush();


        echo "<pre>";
        print_r($arrayData);
        echo "</pre>";


        return "ок";
    }

    private function getDenormalizedObject(array $data, string $class, string $searchColumn, $searchData = null, array $context = [])
    {
        if($searchData){
            $targetObjectRepository = $this->em->getRepository($class);
            $targetObject = $targetObjectRepository->findOneBy([$searchColumn => $searchData]);
        }else{
            $targetObject = null;
        }

        $defaultContext = [ObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true];
        $context = array_merge($defaultContext, $context);

        if($targetObject){
            $context = array_merge($context, [AbstractNormalizer::OBJECT_TO_POPULATE => $targetObject, AbstractObjectNormalizer::DEEP_OBJECT_TO_POPULATE => true]);
        }

        $targetObject = $this->serializer->denormalize($data, $class, null, $context);

        if(!($targetObject instanceof Property)){
            $this->em->persist($targetObject);
            $this->em->flush();
        }

        return $targetObject;
    }

    private function getTargetObject(string $data, string $class, string $searchColumn)
    {
        $targetObjectRepository = $this->em->getRepository($class);
        $targetObject = $targetObjectRepository->findOneBy([$searchColumn => $data]);

        if(!$targetObject){
            $targetObject = new $class($data);
            $this->em->persist($targetObject);
            $this->em->flush();
        }

        return $targetObject;
    }

    private function getBooleanFromString(array $data)
    {
        $dataKeys = [
            'rent-pledge',
            'utilities-included',
            'new-flat',
            'phone',
            'internet',
            'room-furniture',
            'rubbish-chute',
            'with-children',
            'with-pets',
            'refrigerator',
            'washing-machine',
            'dishwasher',
            'television',
            'air-conditioner',
            'shower',
            'parking',
        ];
        $booleanValues = [
          'true' => true,
          'да' => true,
          'false' => false,
          'нет' => false,
        ];
        foreach($dataKeys as $key){
            if(array_key_exists($key, $data)){
                $data[$key] = $booleanValues[$data[$key]];
            }
        }

        return $data;
    }

}