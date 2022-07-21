<?php

namespace App\Repository;

use App\Entity\Peculiarity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Peculiarity>
 *
 * @method Peculiarity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Peculiarity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Peculiarity[]    findAll()
 * @method Peculiarity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeculiarityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Peculiarity::class);
    }

    public function add(Peculiarity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Peculiarity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Peculiarity[] Returns an array of Peculiarity objects
     */
    public function findAllNameAsc(): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
//    /**
//     * @return Peculiarity[] Returns an array of Peculiarity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Peculiarity
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
