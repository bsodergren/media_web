<?php

namespace App\Repository;

use App\Entity\VideoMetaData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VideoMetaData>
 */
class VideoMetaDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoMetaData::class);
    }

    //    /**
    //     * @return VideoMetaData[] Returns an array of VideoMetaData objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?VideoMetaData
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
