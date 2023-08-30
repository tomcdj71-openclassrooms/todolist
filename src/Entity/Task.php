<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity]
#[ORM\Table(name: 'task')]
class Task
{

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: Types::INTEGER)]
    #[Assert\Type('integer')]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::STRING)]
    #[Assert\NotBlank(message: 'Vous devez saisir un titre.')]
    private ?string $title;

    #[Assert\NotBlank(message: 'Vous devez saisir du contenu.')]
    #[ORM\Column(type: Types::TEXT)]
    private $content;

    #[ORM\Column(type: 'boolean', options: ["default" => false])]
    private bool $isDone = false;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    private ?User $user = null;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->isDone = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    public function isDone(): ?bool
    {
        return $this->isDone;
    }

    public function toggle($flag): void
    {
        $this->isDone = $flag;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return $this
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
