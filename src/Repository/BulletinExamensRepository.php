<?php

namespace App\Repository;

use App\Entity\BulletinExamens;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BulletinExamens>
 *
 * @method BulletinExamens|null find($id, $lockMode = null, $lockVersion = null)
 * @method BulletinExamens|null findOneBy(array $criteria, array $orderBy = null)
 * @method BulletinExamens[]    findAll()
 * @method BulletinExamens[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BulletinExamensRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BulletinExamens::class);
    }

    public function add(BulletinExamens $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BulletinExamens $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BulletinExamens[] Returns an array of BulletinExamens objects
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

//    public function findOneBySomeField($value): ?BulletinExamens
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
