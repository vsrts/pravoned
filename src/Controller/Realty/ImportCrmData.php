<?php

declare(strict_types=1);

namespace App\Controller\Realty;

use App\Realty\Service\ImportHomeCrmData;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ImportCrmData
{
    /**
     * @var ImportHomeCrmData
     */
    private $importXmlHandler;

    public function __construct(ImportHomeCrmData $importXmlHandler)
    {
        $this->importXmlHandler = $importXmlHandler;
    }

    /**
     * @Route("/import_crm", name="import_crm_data")
     */
    public function importCrmData(){
        $result = $this->importXmlHandler->importData();
        return new Response($result);
    }
}