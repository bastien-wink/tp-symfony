<?php

namespace App\Controller;

use App\Repository\TodoItemRepository;
use http\Exception\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    /**
     * @Route("/list/min-{minId}/max-{maxId}/{sort}", name="todo_list")
     *
     * @Route("/list", name="todo_list_base")
     * @Route("/l", name="todo_list_shortcut")
     */
    public function list(TodoItemRepository $todoRepo, $minId = 0, $maxId=999, $sort = 'id')
    {
        //if($sort != 'title' && $sort != 'description'){
        //    throw new \Exception('sort uniquement par title ou description');
        //}

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
        //$todoList = $todoRepo->findBy(array('done' => false));
        //$todoList = $todoRepo->findBy(['done' => false]);

        // TP 9.1
        $todoList = $todoRepo->getBetween($minId, $maxId, $sort);

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