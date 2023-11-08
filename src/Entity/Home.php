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

    #[ORM\OneToMany(mappedBy: 'home', targetEntity: CLoth::class)]
    private Collection $cLoths;

    public function __construct()
    {
        $this->userHomes = new ArrayCollection();
        $this->cLoths = new ArrayCollection();
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
     * @return Collection<int, CLoth>
     */
    public function getCLoths(): Collection
    {
        return $this->cLoths;
    }

    public function addCLoth(CLoth $cLoth): static
    {
        if (!$this->cLoths->contains($cLoth)) {
            $this->cLoths->add($cLoth);
            $cLoth->setHome($this);
        }

        return $this;
    }

    public function removeCLoth(CLoth $cLoth): static
    {
        if ($this->cLoths->removeElement($cLoth)) {
            // set the owning side to null (unless already changed)
            if ($cLoth->getHome() === $this) {
                $cLoth->setHome(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
