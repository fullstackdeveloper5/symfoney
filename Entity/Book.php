<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ORM\MappedSuperclass] // This is not strictly necessary here but won't hurt
class Book extends BaseEntity
{
    #[ORM\Column(type: "string", length: 255)]
    protected string $title;

    #[ORM\Column(type: "text")]
    protected string $description;

    #[ORM\ManyToOne(targetEntity: Author::class)]
    protected Author $author;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    // Additional properties and methods specific to the Book entity
}
