<?php

declare(strict_types=1);


namespace App\Controller;


use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends BaseController
{
    /**
     * @Route("/news", name="all_news")
     */
    public function allNews(){
        $newsRepository = $this->getRepository(News::class);
        $newsObjects = $newsRepository->findAll();

        return $this->render('news/news_list.html.twig', [
            'news' => $newsObjects,
            'company' => $this->getCompanyData()
        ]);
    }
}