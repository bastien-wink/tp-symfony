<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    /**
     * @Route("/list")
     */
    public function list()
    {
        $todoListExample = [
            'aller sur la lune',
            'acheter du pain',
            'donner à une association'
        ];

        // TodoList sera le nom de la variable dans mon fichier twig
        // Elle contient le tableau de Todo
        return $this->render(
            'todo/list.html.twig',
            ["todoList" => $todoListExample]
        );
    }


    /**
     * @Route("/detail-{idTodo}")
     */
    public function detail($idTodo = 1)
    {
        return $this->render(
            'todo/detail.html.twig',
            ["idTodo" => $idTodo]
        );
    }


}