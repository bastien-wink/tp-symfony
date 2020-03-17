<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    /**
     * @Route("/show")
     */
    public function show()
    {
        $todoListExample = [
            'aller sur la lune',
            'acheter du pain',
            'donner à une association'
        ];

        // TodoList sera le nom de la variable dans mon fichier twig
        // Elle contient le tableau de Todo
        return $this->render(
            'todo/show.html.twig',
            ["todoList" => $todoListExample]
        );
    }
}