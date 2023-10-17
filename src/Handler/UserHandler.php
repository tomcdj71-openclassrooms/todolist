<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * This class implements the UserHandlerInterface
 * It handles user-related actions.
 */
final class UserHandler implements UserHandlerInterface
{
    public const NO_ROLE_ATTRIBUTED = "Aucun rôle n'a été attribué à l'utilisateur.";

    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher,
        private readonly UserRepository $userRepository
    ) {
    }

    /**
     * Delete a user entity.
     *
     * @param User $user the user entity to delete
     */
    public function deleteUser(User $user): void
    {
        $this->userRepository->remove($user);
    }

    /**
     * Manage a user entity, including password hashing.
     */
    public function manageUser(User $user, string $plaintextPassword): void
    {
        if ([] === $user->getRoles()) {
            throw new \InvalidArgumentException(self::NO_ROLE_ATTRIBUTED);
        }

        $hasher = $this->userPasswordHasher;
        $hashedPassword = $hasher->hashPassword($user, $plaintextPassword);
        $user->setPassword($hashedPassword);
        $this->userRepository->save($user);
    }
}
