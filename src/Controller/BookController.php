<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("demo")
     */
    public function doctrineDemo(Request $request, EntityManagerInterface $em, BookRepository $bookRepository)
    {
        dump($request);die;
        
        //$book = new Book();
        //$book->setPages(12);
        //$book->setTitle("Toto a la plage");
        //$em->persist($book);

        //$book = $bookRepository->find(3);
        //$book->setPages(9);
        //$book->setPublishDate(new \DateTime('now'));
        //$em->flush();

        //$books = $bookRepository->findAll();
        //return $this->render('book/index.html.twig', [
        //    'books' => $books,
        //]);


        $newBook = new Book();
        $bookForm = $this->createForm(BookType::class, $newBook);

        $bookForm->handleRequest($request);

//        if(isset($_POST))
        if($bookForm->isSubmitted()){

            $em->persist($newBook);
            $em->flush();

            return $this->redirectToRoute('book_list');
        }

        return $this->render("book/create.html.twig",
            [
                "bookForm" => $bookForm->createView()
            ]
        );

        // Return doit toujours renvoyer une Response (Symfony\Component\HttpFoundation\Response)

        //return new Response();
        //return $this->render("...");
        //return $this->redirectToRoute('book_list');
    }

}



















