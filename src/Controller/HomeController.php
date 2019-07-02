<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
       //return new Response("Mi primera página");
        // 
        //replace this example code with whatever you need
        //dd($this);
        return $this->render('home/home.html.twig');
    }
}
