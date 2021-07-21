<?php

namespace App\Infrastructure\Serializer\Dto;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class NodeDto
{
    /**
     * @var int
     * @Serializer\SerializedName("id")
     * @Serializer\Type("int")
     * @Serializer\Since("1")
     * @Serializer\Groups({"Default"})
     * @Groups({"group1"})
     */
    private int $id;

    /**
     * @var string
     * @Serializer\SerializedName("open_name")
     * @Serializer\Type("string")
     * @Serializer\Since("1")
     * @Serializer\Groups({"Default"})
     * @Groups({"group1"})
     */
    private string $openName;

    /**
     * @var string
     * @Serializer\SerializedName("functional_string")
     * @Serializer\Type("string")
     * @Serializer\Since("1")
     * @Serializer\Groups({"Default", "Some"})
     */
    private string $functionalString;

    /**
     * @var string
     * @Serializer\SerializedName("same_option")
     * @Serializer\Type("string")
     * @Serializer\Since("4")
     * @Serializer\Groups({"Default"})
     */
    private string $sameOption;

    /**
     * @var
     * @var DateTimeInterface|null
     * @Serializer\SerializedName("y_m_d")
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\Since("3")
     * @Serializer\Groups({"Default", "Some"})
     * @Assert\NotNull()
     */
    private DateTimeInterface $yMD;

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

    /**
     * @param int $id
     * @return NodeDto
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $openName
     * @return NodeDto
     */
    public function setOpenName(string $openName): self
    {
        $this->openName = $openName;

        return $this;
    }

    /**
     * @param string $functionalString
     * @return NodeDto
     */
    public function setFunctionalString(string $functionalString): self
    {
        $this->functionalString = $functionalString;

        return $this;
    }

    /**
     * @param string $sameOption
     * @return NodeDto
     */
    public function setSameOption(string $sameOption): self
    {
        $this->sameOption = $sameOption;

        return $this;
    }

    /**
     * @param DateTimeInterface $yMD
     * @return NodeDto
     */
    public function setYMD(DateTimeInterface $yMD): self
    {
        $this->yMD = $yMD;

        return $this;
    }
}