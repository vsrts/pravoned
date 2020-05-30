<?php

declare(strict_types=1);


namespace App\Controller;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
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

    /**
     * @Route("/", name="homepage")
     */
    public function homepage(){
        $companyRepository = $this->em->getRepository(Company::class);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        return $this->render('home.html.twig',['company' => $companyObject]);
    }
}