<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository as SER;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends SER<User>
 *
 * @method User|null   find($id, $lockMode = null, $lockVersion = null)
 * @method User|null   findOneBy(array $criteria, array $orderBy = null)
 * @method array<User> findAll()
 * @method array<User> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class UserRepository extends SER implements PasswordUpgraderInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, User::class);
        $this->entityManager = $this->getEntityManager();
    }

    /**
     * Saves a user to the database.
     *
     * @param User $user the user to save
     *
     * @codeCoverageIgnore
     */
    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * Removes a user from the database.
     *
     * @param User $user the user to remove
     *
     * @codeCoverageIgnore
     */
    public function remove(User $user): void
    {
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

    /**
     * Used to upgrade (rehash)
     * the user's password automatically over time.
     *
     * @codeCoverageIgnore
     */
    public function upgradePassword(
        PasswordAuthenticatedUserInterface $passwordAuthenticatedUser,
        string $newHashedPassword
    ): void {
        if (! $passwordAuthenticatedUser instanceof User) {
            $errorMessage = sprintf(
                'Instances of "%s" are not supported.',
                $passwordAuthenticatedUser::class
            );
            throw new UnsupportedUserException($errorMessage);
        }

        $passwordAuthenticatedUser->setPassword($newHashedPassword);
        $this->save($passwordAuthenticatedUser);
    }
}
