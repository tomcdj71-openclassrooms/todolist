<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents a task entity.
 */
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

    #[ORM\Column(
        type: 'boolean',
        options: ['default' => false]
    )]
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

    /**
     * Gets the task ID.
     *
     * @return int|null the task ID
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Gets the task creation date.
     *
     * @return \DateTimeInterface|null the task creation date
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Sets the task creation date.
     *
     * @param \DateTimeInterface $createdAt the task creation date
     *
     * @return $this
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the task title.
     *
     * @return string|null the task title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets the task title.
     *
     * @param string $title the task title
     *
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the task content.
     *
     * @return string|null the task content
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Sets the task content.
     *
     * @param string $content the task content
     *
     * @return $this
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Gets whether the task is done.
     *
     * @return bool|null whether the task is done
     */
    public function isDone(): ?bool
    {
        return $this->isDone;
    }

    /**
     * Toggles the task done flag.
     *
     * @param bool $flag the flag value
     */
    public function toggle(bool $flag): void
    {
        $this->isDone = $flag;
    }

    /**
     * Gets the user associated with the task.
     *
     * @return UserInterface the user associated with the task
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * Sets the user associated with the task.
     *
     * @param UserInterface $user the user associated with the task
     *
     * @return $this
     */
    public function setUser(UserInterface $user): self
    {
        $this->user = $user;

        return $this;
    }
}
