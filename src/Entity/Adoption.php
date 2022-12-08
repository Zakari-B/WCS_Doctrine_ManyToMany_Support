<?php

namespace App\Entity;

use App\Repository\AdoptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdoptionRepository::class)]
#[ORM\Table(name: 'cat_human')]
class Adoption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'adoptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cat $master = null;

    #[ORM\ManyToOne(inversedBy: 'adoptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Human $servant = null;

    #[ORM\Column(length: 255)]
    private ?string $accomodations = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccomodations(): ?string
    {
        return $this->accomodations;
    }

    public function setAccomodations(string $accomodations): self
    {
        $this->accomodations = $accomodations;

        return $this;
    }

    public function getMaster(): ?Cat
    {
        return $this->master;
    }

    public function setMaster(?Cat $master): self
    {
        $this->master = $master;

        return $this;
    }

    public function getServant(): ?Human
    {
        return $this->servant;
    }

    public function setServant(?Human $servant): self
    {
        $this->servant = $servant;

        return $this;
    }
}
