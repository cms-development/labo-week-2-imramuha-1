<?php

namespace App\Repository;

use App\Entity\Reacties;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Reacties|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reacties|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reacties[]    findAll()
 * @method Reacties[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReactiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reacties::class);
    }

    // /**
    //  * @return Reacties[] Returns an array of Reacties objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reacties
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
