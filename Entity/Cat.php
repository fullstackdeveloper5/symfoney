<?php

namespace App\Entity;

use App\Repository\CatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatRepository::class)]
class Cat extends Animal
{

    #[ORM\Column(type:"boolean")]
    private $hasTail;

    public function getHasTail(): ?bool
    {
        return $this->hasTail;
    }

    public function setHasTail(?bool $hasTail): self
    {
        $this->hasTail = $hasTail;

        return $this;
    }
}
