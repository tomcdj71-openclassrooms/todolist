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

    /**
     * Checks if the given attribute is supported for the given subject.
     *
     * @param string $attribute the attribute to check
     * @param mixed  $subject   the subject to check against
     *
     * @return bool
     *              Returns true if the attribute is supported for the subject,
     *              Returns false otherwise
     */
    protected function supports(string $attribute, mixed $subject): bool
    {
        return self::OWNER === $attribute && $subject instanceof Task;
    }

    /**
     * This method is called by Symfony's security
     * For knowing if the current user has access to a specific task.
     *
     * @param string         $attribute The attribute being checked
     * @param mixed          $subject   The subject being checked
     * @param TokenInterface $token     The current user token
     *
     * @return bool If the user has access to the task
     */
    protected function voteOnAttribute(
        string $attribute,
        mixed $subject,
        TokenInterface $token
    ): bool {
        $user = $token->getUser();

        if (! $user instanceof User) {
            // @codeCoverageIgnoreStart
            return false;
            // @codeCoverageIgnoreEnd
        }

        // If the user is an admin, they can do anything
        if (in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            return true;
        }

        /** @var Task $task */
        $task = $subject;

        // If the task does not belong to a user, deny access
        if (! $task->getUser() instanceof User) {
            // @codeCoverageIgnoreStart
            return false;
            // @codeCoverageIgnoreEnd
        }

        // If the user owns the task, grant access
        return $user === $task->getUser();
    }
}
