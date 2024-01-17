<?php

namespace App\Entity;

use App\Repository\BaseEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BaseEntityRepository::class)]
#[ORM\MappedSuperclass]
class BaseEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    protected readonly int $id;

    #[ORM\Column(type: "string", length: 255)]
    protected readonly string $name;

    #[ORM\Column(type: "datetime")]
    protected readonly \DateTimeInterface $createdAt;

    #[ORM\Column(type: "datetime")]
    protected readonly \DateTimeInterface $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    // Other common properties and methods can go here
}