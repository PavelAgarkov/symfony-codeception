<?php

namespace App\Infrastructure\Serializer\Dto;

use JMS\Serializer\Annotation as Serializer;

class ResourceTypeDto
{
    /**
     * @Serializer\SerializedName("sounds")
     * @Serializer\Type("ArrayCollection<string, ArrayCollection<string>>")
     */
    private $sounds;

    /**
     * @return ResourceDto[]
     */
    public function getSounds(): array
    {
        return $this->sounds;
    }

    /**
     * @param ResourceDto[] $sounds
     */
    public function setSounds(array $sounds): void
    {
        $this->sounds = $sounds;
    }
}