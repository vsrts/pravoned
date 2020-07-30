<?php

declare(strict_types=1);


namespace App\Controller;

use App\Entity\Realty\Agent;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(){

        $agentsRepository = $this->getRepository(Agent::class);
        $agentsObject = $agentsRepository->findAll();

        return $this->render('home.html.twig',['company' => $this->getCompanyData(), 'agents' => $agentsObject]);
    }
}