<?php

declare(strict_types=1);

namespace App\HomeCrm\Handlers;

use App\Entity\Realty;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class ImportXmlHandler
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
        foreach($arrayData['offer'] as $data){
            $realtyRepository = $this->em->getRepository(Realty::class);
            $existRealty = $realtyRepository->findOneBy(['code' => $data['@internal-id']]);

            $realty = $this->serializer->denormalize($data, Realty::class);
            if($existRealty){
                $realty->setId($existRealty->getId());
            }

            $this->em->persist($realty);
        }
        $this->em->flush();
        echo "<pre>";
        print_r($arrayData);
        echo "</pre>";
//        $realties = $this->serializer->deserialize($xmlData, Realty::class, 'xml');

//        $this->em->persist($realties);
//        $this->em->flush();

        return "ок";
    }
}