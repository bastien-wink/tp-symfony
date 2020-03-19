<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }



    public function getLargeBooksWithDescription()
    {
        $query = $this->createQueryBuilder('b');

        $query->where('b.pages > 100');

        if(true){
            $query->andWhere('b.description IS NOT NULL ');
        }

        $query->orderBy('b.pages', 'DESC');
        $query->setMaxResults(20);

        return $query->getQuery()->getResult();
    }

}
