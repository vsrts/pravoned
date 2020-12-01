<?php

declare(strict_types=1);


namespace App\Controller;

use App\Entity\News;
use App\Entity\Realty\Agent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(){

        $agentsRepository = $this->getRepository(Agent::class);
        $agentsObject = $agentsRepository->findAll();
        $newsRepository = $this->getRepository(News::class);
        $lastNews = $newsRepository->findOneBy([], ['createdAt' => 'DESC']);

        $contents = $this->getContent(
            'home.html.twig',
            ['agents' => $agentsObject, 'lastNews' => $lastNews],
            ['propertySearchForm' => true]
        );

        return new Response($contents);

    }
}