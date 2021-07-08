<?php

namespace App\Infrastructure\Serializer\Dto;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var
     * @var DateTimeInterface|null
     * @Serializer\SerializedName("y_m_d")
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Assert\NotNull()
     */
    private DateTimeInterface $yMD;

    /**
     * NodeDto constructor.
     * @param int $id
     * @param string $openName
     * @param string $functionalString
     * @param string $sameOption
     * @param DateTimeInterface $yMD
     */
    public function __construct(int $id, string $openName, string $functionalString, string $sameOption, DateTimeInterface $yMD)
    {
        $this->id = $id;
        $this->openName = $openName;
        $this->functionalString = $functionalString;
        $this->sameOption = $sameOption;
        $this->yMD = $yMD;
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

    /**
     * @return DateTimeInterface
     */
    public function getYMD(): DateTimeInterface
    {
        return $this->yMD;
    }
}