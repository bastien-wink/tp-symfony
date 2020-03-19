<?php

namespace App\Controller;

use App\Repository\TodoItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    /**
     * @Route("/list", name="todo_list")
     */
    public function list(TodoItemRepository $todoRepo)
    {
        $countResult = $todoRepo->count(['done' => false]);

        //$todoListExample = [
        //    'aller sur la lune',
        //    'acheter du pain',
        //    'donner à une association'
        //];

        // TP 8.1
        //$todoList = $todoRepo->findAll();

        // TP 8.2
        //$todoList = $todoRepo->findByDone(false);
        //$todoList = $todoRepo->findBy(array('done' => false]);
        //$todoList = $todoRepo->findBy(['done' => false]);

        // TP 9.1
        $todoList = $todoRepo->getBetween2and7();

        // TodoList sera le nom de la variable dans mon fichier twig
        // Elle contient le tableau de Todo
        return $this->render(
            'todo/list.html.twig',
            [
                "todoList" => $todoList,
                "countResult" => $countResult
            ]
        );
    }

    /**
     * @Route("/detail/{id}", name="todo_detail")
     */
    public function detail($id, TodoItemRepository $todoRepo)
    {
        $todoItem = $todoRepo->find($id);

        return $this->render(
            'todo/detail.html.twig',
            ["todoItem" => $todoItem]
        );
    }


}