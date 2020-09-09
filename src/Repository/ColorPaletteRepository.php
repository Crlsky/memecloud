<?php

namespace App\Repository;

use App\Entity\ColorPalette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ColorPalette|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColorPalette|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColorPalette[]    findAll()
 * @method ColorPalette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorPaletteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ColorPalette::class);
    }

    // /**
    //  * @return ColorPalette[] Returns an array of ColorPalette objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ColorPalette
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
