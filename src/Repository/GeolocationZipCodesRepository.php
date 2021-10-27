<?php

namespace App\Repository;

use App\Entity\GeolocationZipCodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GeolocationZipCodes|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeolocationZipCodes|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeolocationZipCodes[]    findAll()
 * @method GeolocationZipCodes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeolocationZipCodesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeolocationZipCodes::class);
    }

    // /**
    //  * @return GeolocationZipCodes[] Returns an array of GeolocationZipCodes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GeolocationZipCodes
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
