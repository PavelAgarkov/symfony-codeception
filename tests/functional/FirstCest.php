<?php

namespace App\Tests\functional;

use App\Service\MyService;
use App\Tests\FunctionalTester;

class FirstCest
{
    public function testFirst(FunctionalTester $I): void
    {
        $service = $I->grabService(MyService::class);

//        dd($service->getOne());
//        $this->assertEquals(1, $service->getOne());
    }

}