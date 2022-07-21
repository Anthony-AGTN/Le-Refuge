<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
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
    private ?File $photoFile = null;

    #[ORM\ManyToMany(targetEntity: AnimalKeeper::class, inversedBy: 'animals')]
    private Collection $animalKeepers;

    public function __construct()
    {
        $this->animalKeepers = new ArrayCollection();
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

    public function setPhotoFile(File $image = null): Animal
    {
        $this->photoFile = $image;
        return $this;
    }

    public function getPhotoFile(): ?File
    {
        return $this->photoFile;
    }

    /**
     * @return Collection<int, AnimalKeeper>
     */
    public function getAnimalKeepers(): Collection
    {
        return $this->animalKeepers;
    }

    public function addAnimalKeeper(AnimalKeeper $animalKeeper): self
    {
        if (!$this->animalKeepers->contains($animalKeeper)) {
            $this->animalKeepers[] = $animalKeeper;
        }

        return $this;
    }

    public function removeAnimalKeeper(AnimalKeeper $animalKeeper): self
    {
        $this->animalKeepers->removeElement($animalKeeper);

        return $this;
    }
}
