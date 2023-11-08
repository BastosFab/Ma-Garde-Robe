<?php

namespace App\Entity;

use App\Repository\HomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomeRepository::class)]
class Home
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'home', targetEntity: UserHome::class)]
    private Collection $userHomes;

    #[ORM\OneToMany(mappedBy: 'home', targetEntity: Cloth::class)]
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
            $userHome->setHome($this);
        }

        return $this;
    }

    public function removeUserHome(UserHome $userHome): static
    {
        if ($this->userHomes->removeElement($userHome)) {
            // set the owning side to null (unless already changed)
            if ($userHome->getHome() === $this) {
                $userHome->setHome(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cloth>
     */
    public function getCLoths(): Collection
    {
        return $this->cloths;
    }

    public function addCLoth(Cloth $cloth): static
    {
        if (!$this->cloths->contains($cloth)) {
            $this->cloths->add($cloth);
            $cloth->setHome($this);
        }

        return $this;
    }

    public function removeCLoth(Cloth $cloth): static
    {
        if ($this->cloths->removeElement($cloth)) {
            // set the owning side to null (unless already changed)
            if ($cloth->getHome() === $this) {
                $cloth->setHome(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
