<?php

namespace App\Tests;
use App\Tests\AcceptanceTester;

class First1Cest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/1');
        $I->see('onKernelRequest');
    }
}
