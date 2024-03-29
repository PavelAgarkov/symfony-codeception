<?php

namespace App\Tests\functional\JmsSerializer;

use App\Infrastructure\Serializer\Dto\DateDto;
use App\Infrastructure\Serializer\Dto\ListDto;
use App\Infrastructure\Serializer\Dto\NodeDto;
use App\Infrastructure\Serializer\Dto\ResourceTypeDto;
use App\Infrastructure\Serializer\Dto\ResourceValidationGetResourcesDto;
use App\Tests\FunctionalTester;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

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
//            'y_m_d' => '2020-12-24',
        ];

        /** @var Serializer $jms */
        $jms = $I->grabService(SerializerInterface::class);

        $denormalize = $jms->fromArray($data, NodeDto::class);
        var_dump($denormalize);


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

    public function testSimpleSerialization(FunctionalTester $tester): void
    {
        $data =
            [
                'sounds' =>
                    [
                        'beep',
                        'be',
                    ],
            ];

        /** @var Serializer $jms */
        $jms = $tester->grabService(SerializerInterface::class);

        $denormalize = $jms->fromArray($data, ResourceTypeDto::class);

        $normalize = $jms->toArray($denormalize);

        $tester->assertEquals($data, $normalize);
    }

    public function testNotSimpleSerialization(FunctionalTester $tester): void
    {
        $data = [
            'params' =>
                [
                    'sounds' =>
                        [
                            '2r' =>'beep',
                            '2r3' => 'click'
                        ],

                    'requirements' =>
                        [
                            'bbbbbbbbbbbb.wb'
                        ],

                    'packages' =>
                        [
                            'lib.deb'
                        ]
                ]
        ];

        /** @var Serializer $jms */
        $jms = $tester->grabService(SerializerInterface::class);

        $denormalize = $jms->fromArray($data, ResourceValidationGetResourcesDto::class);

        $normalize = $jms->toArray($denormalize);

        $tester->assertEquals($data, $normalize);
    }
}