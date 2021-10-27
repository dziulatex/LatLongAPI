<?php

namespace App\Repository;

use App\Entity\HistoryOfApifetching;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoryOfApifetching|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoryOfApifetching|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoryOfApifetching[]    findAll()
 * @method HistoryOfApifetching[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoryOfApifetchingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoryOfApifetching::class);
    }

    // /**
    //  * @return HistoryOfApifetching[] Returns an array of HistoryOfApifetching objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistoryOfApifetching
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
