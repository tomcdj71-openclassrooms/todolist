<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class TaskVoter extends Voter
{
    public const LIST = 'list';
    public const EDIT = 'edit';
    public const DELETE = 'delete';
    public const ADD = 'add';

    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array(
            $attribute,
            [self::LIST, self::EDIT, self::DELETE, self::ADD]
        )
        ) {
            return false;
        }
        if (self::ADD === $attribute && null === $subject) {
            return true;
        }

        return $subject instanceof Task;
    }

    protected function voteOnAttribute(
        string $attribute,
        mixed $subject,
        TokenInterface $token
    ): bool {
        $user = $token->getUser();
        if (!$user instanceof User) {
            return false;
        }
        if (in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            return true;
        }
        if (self::ADD === $attribute) {
            return true;
        }
        /** @var Task $task */
        $task = $subject;

        return match ($attribute) {
            self::LIST => $task->getUser() === $user,
            self::EDIT => $task->getUser() === $user,
            self::DELETE => $task->getUser() === $user,
            default => throw new \LogicException('This code should not be reached!')
        };
    }
}
