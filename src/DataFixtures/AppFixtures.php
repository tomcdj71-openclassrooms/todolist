<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @codeCoverageIgnore
 */
final class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $userPasswordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        // create 2 users
        $user1 = new User();
        $user1->setUsername('alice');
        $user1->setPassword(
            $this->userPasswordHasher
                ->hashPassword($user1, 'alice')
        );
        $user1->setEmail('alice@gmail.com');
        $user1->setRoles(['ROLE_USER']);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('john');
        $user2->setPassword(
            $this->userPasswordHasher
                ->hashPassword($user2, 'john')
        );
        $user2->setEmail('john@gmail.com');
        $user2->setRoles(['ROLE_ADMIN']);
        $manager->persist($user2);

        // create 50 tasks
        for ($i = 0; $i < 50; ++$i) {
            $task = new Task();
            $task->setTitle('task '.$i);
            $task->setContent('content '.$i);
            $task->toggle(rand(0, 1));
            $randInt = rand(1, 2);
            if (1 === $randInt) {
                $user = $user1;
            } elseif (2 === $randInt) {
                $user = $user2;
            } else {
                $user = null;
            }
            $task->setUser($user);
            $manager->persist($task);
        }

        $manager->flush();
    }
}
