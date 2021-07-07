<?php

namespace App\Tests\functional;

use App\Infrastructure\Serializer\Dto\ListDto;
use App\Infrastructure\Serializer\Dto\NodeDto;
use App\Infrastructure\Serializer\Dto\OuterNodeDto;
use App\Tests\FunctionalTester;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerTutorialCest
{
    /**
     * @throws ExceptionInterface
     */
    public function testArrayOneNodeDenormalizeNormalizeSymfonySerializer(FunctionalTester $I): void
    {
        $data = [
            'id' => 1,
            'open_name' => 'Pavel',
            'functional_string' => 'GoToPhP',
            'same_option' => 'sameOnly'
        ];

        /** @var Serializer $serializer */
        $serializer = $I->grabService(SerializerInterface::class);

        $denormalizeDto = $serializer->denormalize($data, NodeDto::class, 'array', [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]);

        $normalizeData = $serializer->normalize($denormalizeDto, 'array');

        $I->assertEquals($data, $normalizeData);
    }

    /**
     * @throws ExceptionInterface
     */
    public function testArraySomeNodeDenormalizeNormalizeSymfonySerializer(FunctionalTester $I): void
    {
        $data = [
            'node_dto' => [
                'id' => 1,
                'open_name' => 'Pavel',
                'functional_string' => 'GoToPhP',
                'same_option' => 'sameOnly'
            ],
            's_m_s' => 'job'
        ];

        /** @var Serializer $serializer */
        $serializer = $I->grabService(SerializerInterface::class);
        $denormalizeDto = $serializer->denormalize($data, OuterNodeDto::class, 'array', [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]);

        $normalizeData = $serializer->normalize($denormalizeDto, 'array');

        $I->assertEquals($data, $normalizeData);
    }


    public function testArrayListNodeDenormalizeNormalizeJmsSerializer(FunctionalTester $I): void
    {
        $data = [
            'list' => [
                [
                    'id' => 1,
                    'open_name' => 'Pavel',
                    'functional_string' => 'GoToPhP',
                    'same_option' => 'sameOnly'
                ],

                [
                    'id' => 2,
                    'open_name' => 'Pavel',
                    'functional_string' => 'GoToPhP',
                    'same_option' => 'sameOnly'
                ]
            ]
        ];

        /** @var \JMS\Serializer\Serializer $jms */
        $jms = $I->grabService(\JMS\Serializer\SerializerInterface::class);

        $denormalize = $jms->fromArray($data, ListDto::class);

        $normalize = $jms->toArray($denormalize);

        $I->assertEquals($data, $normalize);
    }
}