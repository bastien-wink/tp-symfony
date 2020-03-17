<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/hello")
     */
    public function hello()
    {
        $firstname = "bastien";
        $luckyNumber = rand(1,6);

        return $this->render(
            'welcome/hello.html.twig',

            [
                "firstnameTest" => $firstname,
                "luckyNumber" => $luckyNumber
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