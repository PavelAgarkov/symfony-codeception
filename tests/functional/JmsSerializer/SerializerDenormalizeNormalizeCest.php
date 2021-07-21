<?php

namespace App\Tests\functional\JmsSerializer;

use App\Infrastructure\Serializer\Dto\DateDto;
use App\Infrastructure\Serializer\Dto\ListDto;
use App\Infrastructure\Serializer\Dto\NodeDto;
use App\Tests\FunctionalTester;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;

class SerializerDenormalizeNormalizeCest
{
    public function testArrayListNodeDenormalizeNormalizeJmsSerializer(FunctionalTester $I): void
    {
        $inner = [
            'inner_list' =>
                [
                    [
                        'id' => 1,
                        'open_name' => 'Pavel',
                        'functional_string' => 'GoToPhP',
                        'same_option' => 'sameOnly',
                        'y_m_d' => '2020-12-24',
                    ],

                    [
                        'id' => 2,
                        'open_name' => 'Pavel',
                        'functional_string' => 'GoToPhP',
                        'same_option' => 'sameOnly',
                        'y_m_d' => '2020-12-24',
                    ]
                ]
        ];

        $data = ['list' => $inner, 'date' => '2020-06-24'];

        /** @var Serializer $jms */
        $jms = $I->grabService(SerializerInterface::class);

        $denormalize = $jms->fromArray($data, ListDto::class);

        $normalize = $jms->toArray($denormalize);

        $I->assertEquals($data, $normalize);
    }

    public function testArrayOneNodeDenormalizeNormalizeJmsSerializer(FunctionalTester $I): void
    {
        $data = [
            'id' => 1,
            'open_name' => 'Pavel',
            'functional_string' => 'GoToPhP',
            'same_option' => 'sameOnly',
            'y_m_d' => '2020-12-24',
        ];

        /** @var Serializer $jms */
        $jms = $I->grabService(SerializerInterface::class);

        $denormalize = $jms->fromArray($data, NodeDto::class);

        $normalize = $jms->toArray($denormalize);

        $I->assertEquals($data, $normalize);
    }

    public function testDateDenormalizeNormalizeJmsSerializer(FunctionalTester $I): void
    {
        $data = [
            'y_m_d' => '2020-12-24',
            'y_m_d_h_m_s' => '2020-12-24 13:26:11',
        ];

        $jms = $I->grabService(SerializerInterface::class);

        $denormalize = $jms->fromArray($data, DateDto::class);

        $normalize = $jms->toArray($denormalize);

        $I->assertEquals($data, $normalize);
    }
}