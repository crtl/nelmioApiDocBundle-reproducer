<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * Mapped superclass to see how properties are inherited in children docs
 */
#[MappedSuperclass]
abstract class BaseEntity
{

    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    protected ?int $id = null;

    #[Column(type: 'date-time')]
    protected DateTime $dateCreated;

    #[Column(type: 'date-time', nullable: true)]
    protected ?DateTime $dateUpdated;

    public function __construct(DateTime $dateCreated = null, DateTime $dateUpdated = null)
    {
        $this->dateCreated = $dateCreated ?? new DateTime();
        $this->dateUpdated = $dateUpdated;
    }

    public function getId(): int {
        return $this->id ?? -1;
    }

    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    public function setDateCreated(DateTime $dateCreated): self
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    public function getDateUpdated(): ?DateTime
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(?DateTime $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;
        return $this;
    }



}