<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student extends Person
{
    #[ORM\Column(type: "string")]
    protected string $studentId;

    public function getStudentId(): string
    {
        return $this->studentId;
    }

    public function setStudentId(string $studentId): void
    {
        $this->studentId = $studentId;
    }

    // Additional attributes and methods specific to Student
}
