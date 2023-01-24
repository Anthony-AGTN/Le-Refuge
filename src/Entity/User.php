<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Care::class)]
    private Collection $cares;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: FollowUp::class)]
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $care->setUser($this);
        }

        return $this;
    }

    public function removeCare(Care $care): self
    {
        if ($this->cares->removeElement($care)) {
            // set the owning side to null (unless already changed)
            if ($care->getUser() === $this) {
                $care->setUser(null);
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
            $followUp->setUser($this);
        }

        return $this;
    }

    public function removeFollowUp(FollowUp $followUp): self
    {
        if ($this->followUps->removeElement($followUp)) {
            // set the owning side to null (unless already changed)
            if ($followUp->getUser() === $this) {
                $followUp->setUser(null);
            }
        }

        return $this;
    }
}
