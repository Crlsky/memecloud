<?php

namespace App\Repository;

use App\Entity\Memes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Memes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Memes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Memes[]    findAll()
 * @method Memes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MemesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Memes::class);
    }

    // /**
    //  * @return Memes[] Returns an array of Memes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Memes
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
