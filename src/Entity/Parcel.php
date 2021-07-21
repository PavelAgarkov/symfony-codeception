<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="public.parcel")
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\Parcel\ParcelRepository")
 */
class Parcel
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="label", type="text")
     */
    private $label;

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $label
     * @return Parcel
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}