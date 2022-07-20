<?php

namespace App\Repository;

use App\Entity\RateFFTA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RateFFTA>
 *
 * @method RateFFTA|null find($id, $lockMode = null, $lockVersion = null)
 * @method RateFFTA|null findOneBy(array $criteria, array $orderBy = null)
 * @method RateFFTA[]    findAll()
 * @method RateFFTA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RateFFTARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RateFFTA::class);
    }

    public function add(RateFFTA $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RateFFTA $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return RateFFTA[] Returns an array of RateFFTA objects
     */
    public function findAllCodeAsc(): array
    {
        return $this->createQueryBuilder('r')
            ->orderBy('r.code', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return RateFFTA[] Returns an array of RateFFTA objects
     */
    public function findAllLabelAsc(): array
    {
        return $this->createQueryBuilder('r')
            ->orderBy('r.label', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return RateFFTA[] Returns an array of RateFFTA objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RateFFTA
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
