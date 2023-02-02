<?php

namespace App\Entity;

use App\Repository\TypeOfCareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeOfCareRepository::class)]
class TypeOfCare
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Care::class, mappedBy: 'typeOfCares')]
    private Collection $cares;

    public function __construct()
    {
        $this->cares = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $care->addTypeOfCare($this);
        }

        return $this;
    }

    public function removeCare(Care $care): self
    {
        if ($this->cares->removeElement($care)) {
            $care->removeTypeOfCare($this);
        }

        $this->cares->removeElement($care);

        return $this;
    }
}
