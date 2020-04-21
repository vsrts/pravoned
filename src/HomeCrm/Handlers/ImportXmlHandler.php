<?php

declare(strict_types=1);

namespace App\HomeCrm\Handlers;

use Doctrine\ORM\EntityManagerInterface;
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
        $realties = $this->serializer->deserialize(self::HOME_CRM_DATA_XML, Realty::class, xml);

        $this->em->persist($realties);
        $this->em->flush();

        return "ок";
    }
}