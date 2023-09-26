<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'task')]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: Types::INTEGER)]
    #[Assert\Type('integer')]
    private int $id;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::STRING)]
    #[Assert\NotBlank(message: 'Vous devez saisir un titre.')]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'Le titre doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'Le titre doit contenir au maximum {{ limit }} caractères.'
    )]
    private string $title;

    #[Assert\NotBlank(message: 'Vous devez saisir du contenu.')]
    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'Le contenu doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'Le contenu doit contenir au maximum {{ limit }} caractères.'
    )]
    private string $content;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isDone = false;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(
        nullable: false,
        name: 'user_id',
        referencedColumnName: 'id'
    )]
    private UserInterface $user;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function isDone(): ?bool
    {
        return $this->isDone;
    }

    public function toggle(bool $flag): void
    {
        $this->isDone = $flag;
    }

    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @return $this
     */
    public function setUser(UserInterface $user): self
    {
        $this->user = $user;

        return $this;
    }
}
