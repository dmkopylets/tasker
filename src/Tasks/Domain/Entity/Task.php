<?php

declare(strict_types=1);

namespace App\Tasks\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Tasks\Infrastructure\Repository\TaskRepository;
use App\Users\Domain\Entity\User;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ORM\Table(name: 'tasks')]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'task_status', length: 4)]
    private ?string $status = null;

    #[ORM\Column(type: 'task_priority', length: 1)]
    private ?string $priority = null;

    #[ORM\Column(length: 30)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $completedAt = null;

    #[ORM\Column(length: 26)]
    private ?string $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus($status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): static
    {
        $this->priority = $priority;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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

    public function getCompletedAt(): ?\DateTimeImmutable
    {
        return $this->completedAt;
    }

    public function setCompletedAt(\DateTimeImmutable $completedAt): static
    {
        $this->completedAt = $completedAt;

        return $this;
    }

    public function getUserId(): ?Ulid
    {
        return Ulid::fromString($this->user_id);
    }

    public function setUserId(Ulid $user_id): static
    {
        $this->user_id = $user_id->toBase32();

        return $this;
    }

    // public function getOwner(): ?User
    // {
    //     return $this->owner;
    // }

    // public function setOwner(?User $owner): static
    // {
    //     $this->owner = $owner;

    //     return $this;
    // }
}
