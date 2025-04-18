<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    normalizationContext: ['groups' => ['read:collection']],
    denormalizationContext: ['groups' => ['write:item']],
    operations: [
        new GetCollection(),
        new Get(),
        new Post(),
        new Put(),
        new Delete()
    ]
)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:collection'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['read:collection', 'write:item'])]
    private string $nom;

    #[ORM\Column(length: 50)]
    #[Groups(['read:collection', 'write:item'])]
    private string $prenom;

    #[ORM\Column(length: 100, unique: true)]
    #[Groups(['read:collection', 'write:item'])]
    private string $email;

    #[ORM\Column(length: 50)]
    #[Groups(['read:collection', 'write:item'])]
    private string $pays;

    #[ORM\Column(length: 50)]
    #[Groups(['read:collection', 'write:item'])]
    private string $ville;

    #[ORM\Column(length: 50, unique: true)]
    #[Groups(['read:collection', 'write:item'])]
    private string $login;

    #[ORM\Column(length: 100)]
    #[Groups(['write:item'])] // Mot de passe non exposé en lecture
    private string $motDePasse;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['read:collection', 'write:item'])]
    private ?string $filmsFavoris = null;

    #[ORM\ManyToOne(targetEntity: Subscription::class, inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: true)]
    #[Groups(['read:collection', 'write:item'])]
    private ?Subscription $subscription=null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['read:collection'])]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['read:collection'])]
    private \DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getPays(): string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;
        return $this;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;
        return $this;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;
        return $this;
    }

    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function getFilmsFavoris(): ?string
    {
        return $this->filmsFavoris;
    }

    public function setFilmsFavoris(?string $filmsFavoris): static
    {
        $this->filmsFavoris = $filmsFavoris;
        return $this;
    }

    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function setSubscription(?Subscription $subscription): static
    {
        $this->subscription = $subscription;
        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}