<?php


namespace App\Tests\unit;


use Codeception\Test\Unit;
use Doctrine\DBAL\Exception;

class NewTest extends Unit
{
    public function testOne()
    {
        $this->expectException(Exception::class);
        $a = 1;

        throw new Exception();
    }
}