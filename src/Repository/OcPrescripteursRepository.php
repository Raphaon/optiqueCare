<?php

namespace App\Repository;

use App\Entity\OcPrescripteurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OcPrescripteurs>
 *
 * @method OcPrescripteurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method OcPrescripteurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method OcPrescripteurs[]    findAll()
 * @method OcPrescripteurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OcPrescripteursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OcPrescripteurs::class);
    }

    public function add(OcPrescripteurs $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OcPrescripteurs $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OcPrescripteurs[] Returns an array of OcPrescripteurs objects
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

//    public function findOneBySomeField($value): ?OcPrescripteurs
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
