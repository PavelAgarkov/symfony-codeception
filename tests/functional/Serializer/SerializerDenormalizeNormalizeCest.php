<?php

namespace App\Tests\functional\Serializer;

use App\Infrastructure\Serializer\Dto\NodeDto;
use App\Infrastructure\Serializer\Dto\SerializerInnerDto;
use App\Tests\FunctionalTester;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerDenormalizeNormalizeCest
{
    /**
     * @throws ExceptionInterface
     */
    public function testDenormalizeNormalize(FunctionalTester $tester): void
    {
        $data = [
            'id' => 1,
            'open_name' => 'Pavel',
            'functional_string' => 'GoToPhP',
            'same_option' => 'sameOnly',
            'y_m_d' => '2020-12-24',
        ];

        $serializer = $tester->grabService(SerializerInterface::class);

        $denormalizeObject = $serializer->denormalize(
            $data,
            NodeDto::class,
            'array',
            [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]
        );

        $normalizeData = $serializer->normalize($denormalizeObject, 'array');

        $tester->assertEquals($data, $normalizeData);
    }

    /**
     * @throws ExceptionInterface
     */
    public function testDenormalizeNormalizeNestedObject(FunctionalTester $tester): void
    {
        $data = [
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
                        'open_name' => 'Semen',
                        'functional_string' => 'GoToPhP',
                        'same_option' => 'sameOnly',
                        'y_m_d' => '2020-12-24',
                    ]
                ]
        ];

//        /** @var Serializer $serializer */
        $serializer = $tester->grabService(SerializerInterface::class);

//        $serializer = new Serializer(
//            [
//                new DateTimeNormalizer(['datetime_format' => 'Y-m-d', 'datetime_timezone' => null]),
//                new ObjectNormalizer(
//                    null,
//                    new CamelCaseToSnakeCaseNameConverter(),
//                    new PropertyAccessor(),
////                    new PhpDocExtractor(),
//                new ConstructorExtractor([new PhpDocExtractor(), new ReflectionExtractor()])
//                ),
//                new ArrayDenormalizer()
//            ],
//            []
//        );

        $denormalizeObject = $serializer->denormalize(
            $data,
            SerializerInnerDto::class,
            'array',
            [
                AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true,
                'groups' => 'group1'
            ]
        );

        $tester->assertInstanceOf(NodeDto::class, current($denormalizeObject->getInnerList()));

        // normalize datetime
        $normalizeByGroupData = $serializer->normalize($denormalizeObject, 'array');

        $tester->assertEquals(['inner_list' => [['id' => 1, 'open_name' => "Pavel"], ['id' => 2, 'open_name' => 'Semen']]], $normalizeByGroupData);
    }
}