<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use lenet\ReportPart;

/**
 * @extends ServiceEntityRepository<lenet\ReportPart>
 *
 * @method ReportPart|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReportPart|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReportPart[]    findAll()
 * @method ReportPart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportPartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReportPart::class);
    }

    public function add(ReportPart $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ReportPart $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
