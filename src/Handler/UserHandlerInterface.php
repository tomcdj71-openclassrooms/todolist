<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\User;

/**
 * Interface UserHandlerInterface.
 *
 * This interface is used to manage a user entity.
 * The methods are used to save, delete and manage a user entity.
 */
interface UserHandlerInterface
{
    /**
     * Manage a user entity, including password hashing.
     *
     * @param User   $user              the user entity to manage
     * @param string $plaintextPassword the plaintext password to hash and set
     *
     * @throws \InvalidArgumentException if the password is not a string
     * @throws \InvalidArgumentException if no role is attributed to the user
     */
    public function manageUser(User $user, string $plaintextPassword): void;

    /**
     * Delete a user entity.
     *
     * @param User $user the user entity to delete
     */
    public function deleteUser(User $user): void;
}
