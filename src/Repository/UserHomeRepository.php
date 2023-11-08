<?php

namespace App\Repository;

use App\Entity\UserHome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserHome>
 *
 * @method UserHome|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserHome|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserHome[]    findAll()
 * @method UserHome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserHomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserHome::class);
    }

//    /**
//     * @return UserHome[] Returns an array of UserHome objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserHome
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
