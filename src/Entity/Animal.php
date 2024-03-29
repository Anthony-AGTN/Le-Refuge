<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
#[Vich\Uploadable]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $latinName = null;

    #[ORM\Column(length: 255)]
    private ?string $vernacularName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $arrivalDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $departureDate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $photo = null;

    #[Vich\UploadableField(mapping: 'photo_file', fileNameProperty: 'photo')]
    #[Assert\File(
        maxSize: '2M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
    )]
    private ?File $photoFile = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'animal', targetEntity: Care::class, orphanRemoval: true)]
    private Collection $cares;

    #[ORM\OneToMany(mappedBy: 'animal', targetEntity: FollowUp::class, orphanRemoval: true)]
    private Collection $followUps;

    public function __construct()
    {
        $this->cares = new ArrayCollection();
        $this->followUps = new ArrayCollection();
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

    public function getLatinName(): ?string
    {
        return $this->latinName;
    }

    public function setLatinName(string $latinName): self
    {
        $this->latinName = $latinName;

        return $this;
    }

    public function getVernacularName(): ?string
    {
        return $this->vernacularName;
    }

    public function setVernacularName(string $vernacularName): self
    {
        $this->vernacularName = $vernacularName;

        return $this;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrivalDate;
    }

    public function setArrivalDate(\DateTimeInterface $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(?\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function setPhotoFile(File $image = null): void
    {
        $this->photoFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getPhotoFile(): ?File
    {
        return $this->photoFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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
            $care->setAnimal($this);
        }

        return $this;
    }

    public function removeCare(Care $care): self
    {
        if ($this->cares->removeElement($care)) {
            // set the owning side to null (unless already changed)
            if ($care->getAnimal() === $this) {
                $care->setAnimal(null);
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
            $followUp->setAnimal($this);
        }

        return $this;
    }

    public function removeFollowUp(FollowUp $followUp): self
    {
        if ($this->followUps->removeElement($followUp)) {
            // set the owning side to null (unless already changed)
            if ($followUp->getAnimal() === $this) {
                $followUp->setAnimal(null);
            }
        }

        return $this;
    }
}
