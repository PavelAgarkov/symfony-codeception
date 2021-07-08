<?php

namespace App\Infrastructure\Serializer\Dto;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

class InnerDto
{
    /**
     * @var ArrayCollection
     * @Serializer\SerializedName("inner_list")
     * @Serializer\Type("ArrayCollection<App\Infrastructure\Serializer\Dto\NodeDto>")
     */
    private ArrayCollection $innerList;

    /**
     * InnerDto constructor.
     */
    public function __construct()
    {
        $this->innerList = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getInnerList(): ArrayCollection
    {
        return $this->innerList;
    }

    /**
     * @param ArrayCollection $innerList
     */
    public function setInnerList(ArrayCollection $innerList): void
    {
        $this->innerList = $innerList;
    }
}