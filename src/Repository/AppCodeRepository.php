<?php

namespace App\Repository;

use App\Entity\AppCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AppCode|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppCode|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppCode[]    findAll()
 * @method AppCode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppCode::class);
    }

    // /**
    //  * @return AppCode[] Returns an array of AppCode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AppCode
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
