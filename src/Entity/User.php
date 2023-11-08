<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
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
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: UserHome::class)]
    private Collection $userHomes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: CLoth::class)]
    private Collection $cloths;

    public function __construct()
    {
        $this->userHomes = new ArrayCollection();
        $this->cloths = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
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

    public function setRoles(array $roles): static
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

    public function setPassword(string $password): static
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, UserHome>
     */
    public function getUserHomes(): Collection
    {
        return $this->userHomes;
    }

    public function addUserHome(UserHome $userHome): static
    {
        if (!$this->userHomes->contains($userHome)) {
            $this->userHomes->add($userHome);
            $userHome->setUser($this);
        }

        return $this;
    }

    public function removeUserHome(UserHome $userHome): static
    {
        if ($this->userHomes->removeElement($userHome)) {
            // set the owning side to null (unless already changed)
            if ($userHome->getUser() === $this) {
                $userHome->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CLoth>
     */
    public function getcloths(): Collection
    {
        return $this->cloths;
    }

    public function addCLoth(CLoth $cLoth): static
    {
        if (!$this->cloths->contains($cLoth)) {
            $this->cloths->add($cLoth);
            $cLoth->setUser($this);
        }

        return $this;
    }

    public function removeCLoth(CLoth $cLoth): static
    {
        if ($this->cloths->removeElement($cLoth)) {
            // set the owning side to null (unless already changed)
            if ($cLoth->getUser() === $this) {
                $cLoth->setUser(null);
            }
        }

        return $this;
    }
}
