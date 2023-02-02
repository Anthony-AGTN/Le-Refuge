<?php

namespace App\Entity;

use App\Repository\CareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CareRepository::class)]
class Care
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'cares')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    #[ORM\ManyToMany(targetEntity: TypeOfCare::class, inversedBy: 'cares')]
    private Collection $typeOfCares;

    #[ORM\ManyToOne(inversedBy: 'cares')]
    private ?User $user = null;

    public function __construct()
    {
        $this->typeOfCares = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * @return Collection<int, TypeOfCare>
     */
    public function getTypeOfCares(): Collection
    {
        return $this->typeOfCares;
    }

    public function addTypeOfCare(TypeOfCare $typeOfCare): self
    {
        if (!$this->typeOfCares->contains($typeOfCare)) {
            $this->typeOfCares->add($typeOfCare);
            $typeOfCare->addCare($this);
        }

        return $this;
    }

    public function removeTypeOfCare(TypeOfCare $typeOfCare): self
    {
        $this->typeOfCares->removeElement($typeOfCare);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
