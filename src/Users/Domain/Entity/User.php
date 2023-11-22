<?php

declare(strict_types=1);

namespace App\Users\Domain\Entity;

use App\Users\Infrastructure\Repository\UserRepository;
use App\Shared\Domain\Service\UlidService;
use Symfony\Component\Uid\Ulid;
use App\Tasks\Domain\Entity\Task;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users_user')]
class User
{
    #[ORM\Id]
    #[ORM\Column(length: 26, nullable: false, unique: true)]
    private ?string $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 12, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 20)]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'owner', targetEntity: Task::class, orphanRemoval: true)]
    private Collection $tasks;

    public function __construct(string $email, string $password)
    {
        $this->id = UlidService::generate();
        $this->email = $email;
        $this->password = $password;
        $this->tasks = new ArrayCollection();
    }

    public function getId(): string
    {
        return $this->id->toBase32();
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Task>
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): static
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks->add($task);
            $task->setOwner($this);
        }

        return $this;
    }

    public function removeTask(Task $task): static
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getOwner() === $this) {
                $task->setOwner(null);
            }
        }

        return $this;
    }
}
