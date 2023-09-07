<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class UserVoter extends Voter
{
    public const LIST = 'list';
    public const VIEW = 'view';
    public const EDIT = 'edit';

    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array($attribute, [self::VIEW, self::EDIT, self::LIST])) {
            return false;
        }
        if (self::LIST === $attribute) {
            return true;
        }

        return $subject instanceof User;
    }

    protected function voteOnAttribute(
        string $attribute,
        mixed $subject,
        TokenInterface $token
    ): bool {
        $authenticatedUser = $token->getUser();
        if (!$authenticatedUser instanceof User) {
            return false;
        }
        if (in_array('ROLE_ADMIN', $authenticatedUser->getRoles(), true)) {
            return true;
        }
        switch ($attribute) {
            case self::LIST:
                return false; // Since only admins can list all users.
            case self::VIEW:
                return $authenticatedUser === $subject;
            case self::EDIT:
                return $authenticatedUser === $subject;
        }

        throw new \LogicException('This code should not be reached!');
    }
}
