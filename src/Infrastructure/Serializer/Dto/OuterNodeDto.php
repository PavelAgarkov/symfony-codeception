<?php

namespace App\Infrastructure\Serializer\Dto;

class OuterNodeDto
{
    /**
     * @var NodeDto
     */
    private NodeDto $nodeDto;

    /**
     * @var string
     */
    private string $sMS;

    /**
     * OutedDto constructor.
     * @param NodeDto $nodeDto
     * @param string $sMS
     */
    public function __construct(NodeDto $nodeDto, string $sMS)
    {
        $this->nodeDto = $nodeDto;
        $this->sMS = $sMS;
    }

    /**
     * @return NodeDto
     */
    public function getNodeDto(): NodeDto
    {
        return $this->nodeDto;
    }

    /**
     * @return string
     */
    public function getSMS(): string
    {
        return $this->sMS;
    }

}