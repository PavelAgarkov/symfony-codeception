<?php

namespace App\Infrastructure\Serializer\Dto;

use JMS\Serializer\Annotation as Serializer;

class ResourceValidationGetResourcesDto
{
    /**
     * @Serializer\SerializedName("params")
     * @Serializer\Type("ArrayCollection<string, ArrayCollection<string>>")
     */
    private $params;

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}