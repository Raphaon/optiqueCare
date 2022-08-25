<?php

namespace App\Repository;

use App\Entity\OcPrescripteurFonctions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OcPrescripteurFonctions>
 *
 * @method OcPrescripteurFonctions|null find($id, $lockMode = null, $lockVersion = null)
 * @method OcPrescripteurFonctions|null findOneBy(array $criteria, array $orderBy = null)
 * @method OcPrescripteurFonctions[]    findAll()
 * @method OcPrescripteurFonctions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OcPrescripteurFonctionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OcPrescripteurFonctions::class);
    }

    public function add(OcPrescripteurFonctions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OcPrescripteurFonctions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OcPrescripteurFonctions[] Returns an array of OcPrescripteurFonctions objects
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

//    public function findOneBySomeField($value): ?OcPrescripteurFonctions
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
