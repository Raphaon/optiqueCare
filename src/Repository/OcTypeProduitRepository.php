<?php

namespace App\Repository;

use App\Entity\OcTypeProduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OcTypeProduit>
 *
 * @method OcTypeProduit|null find($id, $lockMode = null, $lockVersion = null)
 * @method OcTypeProduit|null findOneBy(array $criteria, array $orderBy = null)
 * @method OcTypeProduit[]    findAll()
 * @method OcTypeProduit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OcTypeProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OcTypeProduit::class);
    }

    public function add(OcTypeProduit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OcTypeProduit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OcTypeProduit[] Returns an array of OcTypeProduit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OcTypeProduit
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
