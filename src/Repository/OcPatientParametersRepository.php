<?php

namespace App\Repository;

use App\Entity\OcPatientParameters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OcPatientParameters>
 *
 * @method OcPatientParameters|null find($id, $lockMode = null, $lockVersion = null)
 * @method OcPatientParameters|null findOneBy(array $criteria, array $orderBy = null)
 * @method OcPatientParameters[]    findAll()
 * @method OcPatientParameters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OcPatientParametersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OcPatientParameters::class);
    }

    public function add(OcPatientParameters $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OcPatientParameters $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OcPatientParameters[] Returns an array of OcPatientParameters objects
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

//    public function findOneBySomeField($value): ?OcPatientParameters
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
