<?php

namespace App\Entity;

use App\Repository\AnimalKeeperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalKeeperRepository::class)]
class AnimalKeeper
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\ManyToMany(targetEntity: Animal::class, mappedBy: 'animalKeepers')]
    private Collection $animals;

    #[ORM\OneToMany(mappedBy: 'animalKeeper', targetEntity: Care::class, orphanRemoval: true)]
    private Collection $cares;

    #[ORM\OneToMany(mappedBy: 'animalKeeper', targetEntity: FollowUp::class, orphanRemoval: true)]
    private Collection $followUps;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->cares = new ArrayCollection();
        $this->followUps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): self
    {
        if (!$this->animals->contains($animal)) {
            $this->animals[] = $animal;
            $animal->addAnimalKeeper($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): self
    {
        if ($this->animals->removeElement($animal)) {
            $animal->removeAnimalKeeper($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Care>
     */
    public function getCares(): Collection
    {
        return $this->cares;
    }

    public function addCare(Care $care): self
    {
        if (!$this->cares->contains($care)) {
            $this->cares->add($care);
            $care->setAnimalKeeper($this);
        }

        return $this;
    }

    public function removeCare(Care $care): self
    {
        if ($this->cares->removeElement($care)) {
            // set the owning side to null (unless already changed)
            if ($care->getAnimalKeeper() === $this) {
                $care->setAnimalKeeper(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FollowUp>
     */
    public function getFollowUps(): Collection
    {
        return $this->followUps;
    }

    public function addFollowUp(FollowUp $followUp): self
    {
        if (!$this->followUps->contains($followUp)) {
            $this->followUps->add($followUp);
            $followUp->setAnimalKeeper($this);
        }

        return $this;
    }

    public function removeFollowUp(FollowUp $followUp): self
    {
        if ($this->followUps->removeElement($followUp)) {
            // set the owning side to null (unless already changed)
            if ($followUp->getAnimalKeeper() === $this) {
                $followUp->setAnimalKeeper(null);
            }
        }

        return $this;
    }
}
