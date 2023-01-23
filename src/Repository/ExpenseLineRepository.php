<?php

namespace App\Repository;

use App\Entity\ExpenseLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExpenseLine>
 *
 * @method ExpenseLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpenseLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpenseLine[]    findAll()
 * @method ExpenseLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpenseLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseLine::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ExpenseLine $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ExpenseLine $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ExpenseLine[] Returns an array of ExpenseLine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExpenseLine
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
