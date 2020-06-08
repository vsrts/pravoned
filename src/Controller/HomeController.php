<?php

declare(strict_types=1);


namespace App\Controller;

use App\Entity\Company;
use App\Entity\Realty\Agent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
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

        $agentsRepository = $this->em->getRepository(Agent::class);
        $agentsObject = $agentsRepository->findAll();

        return $this->render('home.html.twig',['company' => $companyObject, 'agents' => $agentsObject]);
    }
}