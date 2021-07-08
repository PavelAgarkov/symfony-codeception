<?php

namespace App\Infrastructure\Serializer\Dto;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class DateDto
{
    /**
     * @var
     * @var DateTimeInterface|null
     * @Serializer\SerializedName("y_m_d")
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Assert\NotNull()
     */
    private DateTimeInterface $yMD;

    /**
     * @var
     * @var DateTimeInterface|null
     * @Serializer\SerializedName("y_m_d_h_m_s")
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Assert\NotNull()
     */
    private DateTimeInterface $yMDHMS;

    /**
     * DateDto constructor.
     * @param DateTimeInterface $yMD
     * @param DateTimeInterface $yMDHMS
     */
    public function __construct(DateTimeInterface $yMD, DateTimeInterface $yMDHMS)
    {
        $this->yMD = $yMD;
        $this->yMDHMS = $yMDHMS;
    }

    /**
     * @return DateTimeInterface
     */
    public function getYMD(): DateTimeInterface
    {
        return $this->yMD;
    }

    /**
     * @return DateTimeInterface
     */
    public function getYMDHMS(): DateTimeInterface
    {
        return $this->yMDHMS;
    }
}