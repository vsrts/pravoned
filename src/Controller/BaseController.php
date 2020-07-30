<?php

declare(strict_types=1);


namespace App\Controller;


use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

}