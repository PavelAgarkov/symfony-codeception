<?php

namespace App\Infrastructure\Serializer\Dto;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

use Symfony\Component\Serializer\Annotation as Symfony;

class InnerDto
{
    /**
     * @var ArrayCollection
     * @Symfony\SerializedName("inner_list")
     *
     * @Serializer\SerializedName("inner_list")
     * @Serializer\Type("ArrayCollection<App\Infrastructure\Serializer\Dto\NodeDto>")
     * @Serializer\Groups({"Default", "Some"})
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
}