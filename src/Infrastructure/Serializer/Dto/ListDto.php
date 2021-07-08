<?php

namespace App\Infrastructure\Serializer\Dto;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class ListDto
{
    /**
     * @var InnerDto
     * @Serializer\SerializedName("list")
     * @Serializer\Type("App\Infrastructure\Serializer\Dto\InnerDto")
     */
    private InnerDto $list;

    /**
     * @var
     * @var DateTimeInterface|null
     * @Serializer\SerializedName("date")
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Assert\NotNull()
     */
    private DateTimeInterface $date;

    /**
     * ListDto constructor.
     * @param DateTimeInterface $date
     */
    public function __construct(DateTimeInterface $date)
    {
        $this->list = new InnerDto();
        $this->date = $date;
    }

    /**
     * @return InnerDto
     */
    public function getList(): InnerDto
    {
        return $this->list;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }
}