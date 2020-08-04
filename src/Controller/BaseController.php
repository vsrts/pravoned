<?php

declare(strict_types=1);


namespace App\Controller;

use App\Entity\Company;
use App\Realty\Dto\PropertySearchDto;
use App\Realty\Form\PropertySearchForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
    const COMPANY_ID = 1;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getRepository(string $class){
        return $this->em->getRepository($class);
    }

    public function getCompanyData()
    {
        $companyRepository = $this->em->getRepository(Company::class);
        $companyObject = $companyRepository->find(self::COMPANY_ID);
        return $companyObject;
    }

    public function getContent(string $view, array $params = [], array $options = [])
    {
        $companyRepository = $this->em->getRepository(Company::class);
        $companyObject = $companyRepository->find(self::COMPANY_ID);
        $params['company'] = $companyObject;

        if($options['propertySearchForm'])
        {
            $propertySearch = new PropertySearchDto();
            $form = $this->createForm(PropertySearchForm::class, $propertySearch,
                [
                    'action' => $this->generateUrl('property_search'),
                    'method' => 'GET',
                ]
            );

//            $form->handleRequest($this->request);
//            if ($form->isSubmitted() && $form->isValid()) {
//                $formData = $form->getData();
//            }

            $params['propertySearchForm'] = $form->createView();
        }

        return $this->renderView($view, $params);
    }

}