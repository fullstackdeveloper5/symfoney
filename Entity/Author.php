<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
#[ORM\MappedSuperclass] // This is not strictly necessary here but won't hurt
class Author extends BaseEntity
{
    #[ORM\Column(type: "string", length: 255)]
    protected string $fathername;

    #[ORM\Column(type: "date")]
    protected \DateTimeInterface $birthDate;

    public function getFatherName(): string
    {
        return $this->fathername;
    }

    public function setFatherName(string $fathername): void
    {
        $this->fathername = $fathername;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    // Additional properties and methods specific to the Author entity
}