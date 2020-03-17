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

        return $this->render(
            'welcome/hello.html.twig',

            [
                "firstnameTest" => $firstname
            ]

        );
    }
}