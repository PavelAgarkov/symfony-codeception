<?php

namespace App\Infrastructure\Serializer\Dto;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

class ListDto
{
    /**
     * @var ArrayCollection
     * @Serializer\SerializedName("list")
     * @Serializer\Type("ArrayCollection<App\Infrastructure\Serializer\Dto\NodeDto>")
     */
    private ArrayCollection $list;

    /**
     * ListDto constructor.
     */
    public function __construct()
    {
        $this->list = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getList(): ArrayCollection
    {
        return $this->list;
    }

    /**
     * @param ArrayCollection $list
     */
    public function setList(ArrayCollection $list): void
    {
        $this->list = $list;
    }
}