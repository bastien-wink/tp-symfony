<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/hello/{lastname}", name="say_hello")
     */
    public function hello($lastname = 'valeur par default')
    {
        $firstname = "bastien";

        return $this->render(
            'welcome/hello.html.twig',
            [
                "lastname" => $lastname,
                "firstnameTest" => $firstname,
            ]
        );
    }

    /**
     * @Route("/luckyNumber")
     */
    public function luckyNumber()
    {
        $luckyNumber = rand(1,6);

        return $this->render(
            'welcome/luckyNumber.html.twig',

            [
                "luckyNumber" => $luckyNumber
            ]

        );
    }

}