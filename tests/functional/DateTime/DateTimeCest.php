<?php

namespace App\Tests\functional\DateTime;

use App\Tests\FunctionalTester;
use DateInterval;
use DateTimeImmutable;

class DateTimeCest
{
    public function testImmutableAddInterval(FunctionalTester $functionalTester): void
    {
        $startedAt = new DateTimeImmutable('2019-06-30 10:00:00');

        $finishedAt = $startedAt->add(new DateInterval('PT3M'));

        $functionalTester->assertNotSame($startedAt->format('Y-m-d H:i:s'), $finishedAt->format('Y-m-d H:i:s'));
    }

    public function testImmutable(FunctionalTester $functionalTester): void
    {
        $startedAt = new DateTimeImmutable('2019-06-30 10:00:00');
        $startedAtId = spl_object_id($startedAt);

        /** new DateTimeImmutable -> modify() возвращает новый объект, new DateTime -> modify() возвращает старый объект */
        $newStarted = $startedAt->modify('+10 day');
        $newStartedId = spl_object_id($newStarted);

        $functionalTester->assertNotSame($newStarted->format('Y-m-d H:i:s'), $startedAt->format('Y-m-d H:i:s'));
        $functionalTester->assertNotEquals($startedAtId, $newStartedId);
    }
}