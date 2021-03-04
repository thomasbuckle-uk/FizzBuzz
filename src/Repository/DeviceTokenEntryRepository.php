<?php

namespace App\Repository;

use App\Entity\DeviceTokenEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeviceTokenEntry|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeviceTokenEntry|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeviceTokenEntry[]    findAll()
 * @method DeviceTokenEntry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeviceTokenEntryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeviceTokenEntry::class);
    }

    // /**
    //  * @return DeviceTokenEntry[] Returns an array of DeviceTokenEntry objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeviceTokenEntry
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
