<?php

namespace App\Repository;

use App\Entity\DriveType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DriveType|null find($id, $lockMode = null, $lockVersion = null)
 * @method DriveType|null findOneBy(array $criteria, array $orderBy = null)
 * @method DriveType[]    findAll()
 * @method DriveType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DriveTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DriveType::class);
    }

//    /**
//     * @return DriveType[] Returns an array of DriveType objects
//     */
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
    public function findOneBySomeField($value): ?DriveType
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
