<?php


namespace App\Tests\unit;


use App\Service\Types;
use Codeception\Test\Unit;

class TypesTest extends Unit
{
    public function testIntegerTypeSuccess(): void
    {
        $types = new Types();

        $summ = $types->passedStringIntoIntegerSumm(1, 2);

        self::assertEquals(3, $summ);
    }

    public function testIntegerTypeNegativeStringPassed(): void
    {
        $types = new Types();

        $summ = $types->passedStringIntoIntegerSumm("5", 2);

        self::assertEquals(7, $summ);
    }
}