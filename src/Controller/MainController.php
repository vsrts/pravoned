<?php

declare(strict_types=1);


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(){
        return $this->render('home.html.twig');
    }
}