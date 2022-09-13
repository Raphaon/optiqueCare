<?php

namespace App\Repository;

use App\Entity\OcProduitMedicaments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OcProduitMedicaments>
 *
 * @method OcProduitMedicaments|null find($id, $lockMode = null, $lockVersion = null)
 * @method OcProduitMedicaments|null findOneBy(array $criteria, array $orderBy = null)
 * @method OcProduitMedicaments[]    findAll()
 * @method OcProduitMedicaments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OcProduitMedicamentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OcProduitMedicaments::class);
    }

    public function add(OcProduitMedicaments $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OcProduitMedicaments $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OcProduitMedicaments[] Returns an array of OcProduitMedicaments objects
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

//    public function findOneBySomeField($value): ?OcProduitMedicaments
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
