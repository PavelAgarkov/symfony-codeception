<?php

namespace App\Tests\functional;

use App\Infrastructure\Serializer\Dto\ListDto;
use App\Tests\FunctionalTester;
use Codeception\Example;
use Generator;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;

class JmsSerializerSerializeDeserializeCest
{
    /**
     * @dataProvider getList
     * @param FunctionalTester $tester
     * @param Example $example
     */
    public function testSerializeDeserialize(FunctionalTester $tester, Example $example): void
    {
        [$list] = $example;

        /** @var Serializer $jms */
        $jms = $tester->grabService(SerializerInterface::class);

        $denormalize = $jms->fromArray($list, ListDto::class);

        $json = $jms->serialize($denormalize, 'json');
        $xml = $jms->serialize($denormalize, 'xml');

        $deserializeJson = $jms->deserialize($json,ListDto::class, 'json');
        $deserializeXml = $jms->deserialize($xml, ListDto::class, 'xml');
    }

    /**
     * @dataProvider getList
     * @param FunctionalTester $tester
     * @param Example $example
     */
    public function testSerializeDeserializeVersion(FunctionalTester $tester, Example $example): void
    {
        [$list] = $example;

        /** @var Serializer $jms */
        $jms = $tester->grabService(SerializerInterface::class);

//        * @Serializer\Since("4") можно использовать для разных версий апи v2 v3
        $denormalize = $jms->fromArray($list, ListDto::class, DeserializationContext::create()->setVersion(4));

        $json = $jms->serialize($denormalize, 'json', SerializationContext::create()->setVersion(4));

        $deserializeJson = $jms->deserialize($json,ListDto::class, 'json');
    }

    /**
     * @dataProvider getList
     * @param FunctionalTester $tester
     * @param Example $example
     */
    public function testSerializeDeserializeGroups(FunctionalTester $tester, Example $example): void
    {
        [$list] = $example;

        /** @var Serializer $jms */
        $jms = $tester->grabService(SerializerInterface::class);

        /** Нужно прописывать @Serializer\Groups({"Some"}) во всех родительских объектах, если необходимые данные глубже*/
        $denormalize = $jms->fromArray($list, ListDto::class, DeserializationContext::create()->setGroups(['Some']));

        $json = $jms->serialize($denormalize, 'json', SerializationContext::create()->setGroups(['Some']));

        $deserializeJson = $jms->deserialize($json,ListDto::class, 'json');
    }

    private function getList(): Generator
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

        yield [$data];
    }
}