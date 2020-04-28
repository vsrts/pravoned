<?php

declare(strict_types=1);

namespace App\Controller\ServiceController;

use App\HomeCrm\Handlers\ImportXmlHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ImportCrmDataController
{
    /**
     * @var ImportXmlHandler
     */
    private $importXmlHandler;

    public function __construct(ImportXmlHandler $importXmlHandler)
    {
        $this->importXmlHandler = $importXmlHandler;
    }

    /**
     * @Route("/import_crm", name="import_crm_data")
     */
    public function importCrmData(){
        $result = $this->importXmlHandler->__invoke();
        return new Response($result);
    }
}