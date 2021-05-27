<?php

namespace App\Repository;

use App\Entity\LigneDuPagnier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LigneDuPagnier|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneDuPagnier|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneDuPagnier[]    findAll()
 * @method LigneDuPagnier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneDuPagnierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneDuPagnier::class);
    }

    // /**
    //  * @return LigneDuPagnier[] Returns an array of LigneDuPagnier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneDuPagnier
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
