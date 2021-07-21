<?php

namespace App\Infrastructure\Serializer\Dto;


use Symfony\Component\Serializer\Annotation\Groups;

class SerializerInnerDto
{
    // работает только с массивом
    /**
     * @var NodeDto[] $innerList
     *  @Groups({"group1"})
     */
    private array $innerList;

    /**
     * @return NodeDto[]
     */
    public function getInnerList(): array
    {
        return $this->innerList;
    }

    /**
     * @param NodeDto[] $innerList
     */
    public function setInnerList(array $innerList): void
    {
        $this->innerList = $innerList;
    }
}