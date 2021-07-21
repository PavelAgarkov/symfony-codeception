<?php

namespace App\Tests\functional\Doctrine;

use App\Domain\Parcel\Repository\ParcelRepositoryInterface;
use App\Infrastructure\Repository\Parcel\ParcelRepository;
use App\Tests\FunctionalTester;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class DoctrineCest
{
    public function testDoctrine(FunctionalTester $tester): void
    {
        /** @var ParcelRepository|ServiceEntityRepository $parcelRepository */
        $parcelRepository = $tester->grabService(ParcelRepositoryInterface::class);
        $parcel = $parcelRepository->find(1);
    }
}