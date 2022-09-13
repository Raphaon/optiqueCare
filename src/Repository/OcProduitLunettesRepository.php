<?php

namespace App\Repository;

use App\Entity\OcProduitLunettes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OcProduitLunettes>
 *
 * @method OcProduitLunettes|null find($id, $lockMode = null, $lockVersion = null)
 * @method OcProduitLunettes|null findOneBy(array $criteria, array $orderBy = null)
 * @method OcProduitLunettes[]    findAll()
 * @method OcProduitLunettes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OcProduitLunettesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OcProduitLunettes::class);
    }

    public function add(OcProduitLunettes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OcProduitLunettes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OcProduitLunettes[] Returns an array of OcProduitLunettes objects
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

//    public function findOneBySomeField($value): ?OcProduitLunettes
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
