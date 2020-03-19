<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/book", name="book_list")
     */
    public function index(BookRepository $bookRepository)
    {

        //$laBible = $bookRepository
        //              ->findOneBy(['title'=>'La Bible']);
        //dump($laBible);

        $books = $bookRepository->findAll();
        return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);
    }


    /**
     * @Route("doctrineDemo")
     */
    public function doctrineDemo(EntityManagerInterface $em, BookRepository $bookRepository)
    {
        //$book = new Book();
        //$book->setPages(12);
        //$book->setTitle("Toto a la plage");
        //$em->persist($book);

        $book = $bookRepository->find(3);
        $book->setPages(9);

        $em->flush();

        //$books = $bookRepository->findAll();
        //return $this->render('book/index.html.twig', [
        //    'books' => $books,
        //]);


        // Return doit toujours renvoyer une Response (Symfony\Component\HttpFoundation\Response)

        //return new Response();
        //return $this->render("...");
        return $this->redirectToRoute('book_list');
    }

}



















