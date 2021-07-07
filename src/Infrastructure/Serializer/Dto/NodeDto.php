<?php

namespace App\Infrastructure\Serializer\Dto;

use JMS\Serializer\Annotation as Serializer;

class NodeDto
{
    /**
     * @var int
     * @Serializer\SerializedName("id")
     * @Serializer\Type("int")
     */
    private int $id;

    /**
     * @var string
     * @Serializer\SerializedName("open_name")
     * @Serializer\Type("string")
     */
    private string $openName;

    /**
     * @var string
     * @Serializer\SerializedName("functional_string")
     * @Serializer\Type("string")
     */
    private string $functionalString;

    /**
     * @var string
     * @Serializer\SerializedName("same_option")
     * @Serializer\Type("string")
     */
    private string $sameOption;

    /**
     * NodeDto constructor.
     * @param int $id
     * @param string $openName
     * @param string $functionalString
     * @param string $sameOption
     */
    public function __construct(int $id, string $openName, string $functionalString, string $sameOption)
    {
        $this->id = $id;
        $this->openName = $openName;
        $this->functionalString = $functionalString;
        $this->sameOption = $sameOption;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOpenName(): string
    {
        return $this->openName;
    }

    /**
     * @return string
     */
    public function getFunctionalString(): string
    {
        return $this->functionalString;
    }

    /**
     * @return string
     */
    public function getSameOption(): string
    {
        return $this->sameOption;
    }
}