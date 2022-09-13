<?php

namespace App\Repository;

use App\Entity\BulletinPrescriptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BulletinPrescriptions>
 *
 * @method BulletinPrescriptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method BulletinPrescriptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method BulletinPrescriptions[]    findAll()
 * @method BulletinPrescriptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BulletinPrescriptionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BulletinPrescriptions::class);
    }

    public function add(BulletinPrescriptions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BulletinPrescriptions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BulletinPrescriptions[] Returns an array of BulletinPrescriptions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BulletinPrescriptions
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
