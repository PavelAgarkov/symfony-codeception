<?php

namespace App\Infrastructure\Serializer\Dto;

use JMS\Serializer\Annotation as Serializer;

class ResourceDto
{
    /**
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}