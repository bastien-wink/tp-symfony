<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/book/{param1}", name="book")
     */
    public function index(BookRepository $bookRepository, $param1)
    {
        $books = $bookRepository->findAll();

        //$laBible = $bookRepository
        //              ->findOneBy(['title'=>'La Bible']);
        //dump($laBible);

        return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);
    }
}


















