<?php

namespace App\Infrastructure\Serializer\Dto;

use JMS\Serializer\Annotation as Serializer;
use App\Infrastructure\Serializer\Dto\InnerDto;

class ListDto
{
    /**
     * @var InnerDto
     * @Serializer\SerializedName("list")
     * @Serializer\Type("App\Infrastructure\Serializer\Dto\InnerDto")
     */
    private InnerDto $list;

    /**
     * ListDto constructor.
     */
    public function __construct()
    {
        $this->list = new InnerDto();
    }

    /**
     * @return InnerDto
     */
    public function getList(): InnerDto
    {
        return $this->list;
    }

    /**
     * @param InnerDto $list
     */
    public function setList(InnerDto $list): void
    {
        $this->list = $list;
    }
}