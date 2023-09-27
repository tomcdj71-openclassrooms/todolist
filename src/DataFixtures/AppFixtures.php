<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $userPasswordHasher
    ) {
    }

    public function load(ObjectManager $objectManager): void
    {
        // create the user alice (user)
        $user1 = $this->createUser(
            'alice',
            'alice@gmail.com',
            ['ROLE_USER'],
            $objectManager
        );
        // create the user john (admin)
        $user2 = $this->createUser(
            'john',
            'john@gmail.com',
            ['ROLE_ADMIN'],
            $objectManager
        );

        // create 50 tasks and assign them randomly to the users
        $this->createTasks(
            50,
            [$user1, $user2],
            $objectManager
        );

        $objectManager->flush();
    }

    /**
     * create user.
     *
     * @param array<string> $roles
     */
    private function createUser(
        string $username,
        string $email,
        array $roles,
        ObjectManager $objectManager
    ): User {
        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setRoles($roles);
        $user->setPassword(
            $this->userPasswordHasher
                ->hashPassword(
                    $user,
                    $username
                )
        );

        $objectManager->persist($user);

        return $user;
    }

    /**
     * create tasks.
     *
     * @param array<User> $users
     */
    private function createTasks(
        int $count,
        array $users,
        ObjectManager $objectManager
    ): void {
        for ($i = 0; $i < $count; ++$i) {
            $task = new Task();
            $task->setTitle('task '.$i);
            $task->setContent('content '.$i);
            $task->toggle((bool) rand(0, 1));
            $user = $users[array_rand($users)];
            $task->setUser($user);
            $objectManager->persist($task);
        }
    }
}
