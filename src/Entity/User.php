<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents a user entity.
 */
#[ORM\Entity]
#[ORM\Table(name: 'user')]
#[UniqueEntity(
    fields: ['email'],
    message: 'Cette adresse email est déjà utilisée.'
)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id;

    #[ORM\Column(type: Types::STRING, length: 25, unique: true)]
    #[Assert\NotBlank(message: "Vous devez saisir un nom d'utilisateur.")]
    private string $username;

    #[ORM\Column(type: Types::STRING, length: 50)]
    private string $password;

    /**
     * @var array<string> roles assigned to the user
     */
    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(type: Types::STRING, length: 60, unique: true)]
    #[Assert\NotBlank(message: 'Vous devez saisir une adresse email.')]
    #[Assert\Email(message: "Le format de l'adresse n'est pas correcte.")]
    private string $email;

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    /**
     * Gets roles assigned to the user.
     *
     * @return array<string> an array of role strings
     *
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * Set the roles for the user.
     *
     * @param array<string> $roles an array of role strings
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Returns the user's ID.
     *
     * @return int|null the user's ID
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Returns the user's username.
     *
     * @return string the user's username
     *
     * @throws \LogicException if the username has not been set
     */
    public function getUsername(): string
    {
        assert(
            null !== $this->username,
            new \LogicException(
                'Username should not be accessed before it has been set.'
            )
        );

        return $this->username;
    }

    /**
     * Sets the user's username.
     *
     * @param string $username the user's username
     *
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Returns the user's password.
     *
     * @return string the user's password
     *
     * @throws \LogicException if the password has not been set
     */
    public function getPassword(): string
    {
        assert(
            null !== $this->password,
            new \LogicException(
                'Password should not be accessed before it has been set.'
            )
        );

        return $this->password;
    }

    /**
     * Sets the user's password.
     *
     * @param string $password the user's password
     *
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Clears any sensitive data from the user object.
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary,
        // sensitive data on the user,
        // clear it here
        // $this->plainPassword = null;
    }

    /**
     * Returns the user's email address.
     *
     * @return string the user's email address
     *
     * @throws \LogicException if the email address has not been set
     */
    public function getEmail(): string
    {
        assert(
            null !== $this->email,
            new \LogicException(
                'Email should not be accessed before it has been set.'
            )
        );

        return $this->email;
    }

    /**
     * Sets the user's email address.
     *
     * @param string $email the user's email address
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
