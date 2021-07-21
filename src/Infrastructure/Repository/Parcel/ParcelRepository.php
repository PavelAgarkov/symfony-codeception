<?php

namespace App\Infrastructure\Repository\Parcel;

use App\Domain\Parcel\Repository\ParcelRepositoryInterface;
use App\Entity\Parcel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ParcelRepository extends ServiceEntityRepository implements ParcelRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parcel::class);
    }
}