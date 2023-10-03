<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UserHandler implements UserHandlerInterface
{
    public const PASSWORD_NOT_STRING = 'Le mot de passe doit être une chaîne de caractères.';

    public const NO_ROLE_ATTRIBUTED = 'Aucun rôle n\'a été attribué à l\'utilisateur.';

    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher,
        private readonly UserRepository $userRepository
    ) {
    }

    public function deleteUser(User $user): void
    {
        $this->userRepository->remove($user);
    }

    public function manageUser(User $user, string $plaintextPassword): void
    {
        if ($user->getRoles() === []) {
            throw new \InvalidArgumentException(self::NO_ROLE_ATTRIBUTED);
        }

        $hashedPassword = $this->userPasswordHasher->hashPassword($user, $plaintextPassword);
        $user->setPassword($hashedPassword);
        $this->userRepository->save($user);
    }
}
