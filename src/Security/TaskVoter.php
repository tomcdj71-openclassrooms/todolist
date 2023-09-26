<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class TaskVoter extends Voter
{
    public const OWNER = 'owner';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return $attribute === self::OWNER && $subject instanceof Task;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (! $user instanceof User) {
            return false;
        }

        // If the user is an admin, they can do anything
        if (in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            return true;
        }

        /** @var Task $task */
        $task = $subject;

        // If the task does not belong to a user, deny access
        if (! $task->getUser() instanceof User) {
            return false;
        }

        // If the user owns the task, grant access
        return $user === $task->getUser();
    }
}
