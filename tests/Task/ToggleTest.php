<?php

declare(strict_types=1);

namespace App\Tests\Task;

use App\Entity\Task;
use App\Entity\User;
use App\Tests\WebTestCaseHelperTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ToggleTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    public const BASE_URL = 'http://localhost:8000';
    public const TEST_USER_EMAIL = 'alice@gmail.com';
    public const ADMIN_USER_EMAIL = 'john@gmail.com';

    public function testShouldToogleTask(): void
    {
        $client = $this->setUpClientAndLogin();
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);
        /** @var ?User $user */
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::TEST_USER_EMAIL]
            );
        /** @var ?Task $task */
        $task = $entityManager
            ->getRepository(Task::class)
            ->findOneBy(
                ['user' => $user->getId()]
            );
        $taskUrl = self::BASE_URL.'/tasks/'.$task->getId();
        $client->request(
            Request::METHOD_POST,
            $taskUrl.'/toggle'
        );
        $client->followRedirects(true);
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $isDone = $task->isDone();
        if (true === $isDone) {
            $successMessage = 'La tâche '.$task->getTitle().' a bien été marquée comme terminée.';
        } else {
            $successMessage = 'La tâche '.$task->getTitle().' a bien été marquée comme non-terminée.';
        }
        self::assertFlashBagContains(
            'success',
            $successMessage,
        );
    }

    public function testShouldRaiseHttpAccessDenied(): void
    {
        $client = $this->setUpClientAndLogin();
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);
        /** @var ?User $user */
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::ADMIN_USER_EMAIL]
            );
        /** @var ?Task $task */
        $task = $entityManager
            ->getRepository(Task::class)
            ->findOneBy(
                ['user' => $user->getId()]
            );
        $taskUrl = self::BASE_URL.'/tasks/'.$task->getId();
        $client->request(
            Request::METHOD_POST,
            $taskUrl.'/toggle'
        );
        $client->followRedirects(true);
        self::assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);
    }

    public function testAdminCanToggleOtherUserTask(): void
    {
        $client = $this->setUpClientAndLogin(self::ADMIN_USER_EMAIL);
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);
        /** @var ?User $user */
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::TEST_USER_EMAIL]
            );
        /** @var ?Task $task */
        $task = $entityManager
            ->getRepository(Task::class)
            ->findOneBy(
                ['user' => $user->getId()]
            );
        $taskUrl = self::BASE_URL.'/tasks/'.$task->getId();
        $client->request(
            Request::METHOD_POST,
            $taskUrl.'/toggle'
        );
        $client->followRedirects(true);
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $isDone = $task->isDone();
        $doneMessage = ' a bien été marquée comme terminée.';
        $notDoneMessage = ' a bien été marquée comme non-terminée.';
        if (true === $isDone) {
            $successMessage = 'La tâche '.$task->getTitle().$doneMessage;
        } else {
            $successMessage = 'La tâche '.$task->getTitle().$notDoneMessage;
        }
        self::assertFlashBagContains(
            'success',
            $successMessage,
        );
    }

    private function setUpClientAndLogin(string $email = self::TEST_USER_EMAIL): \Symfony\Bundle\FrameworkBundle\KernelBrowser
    {
        $client = self::createClient();
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(['email' => $email]);
        if (!$user) {
            throw new \Exception("User with email {$email} not found.");
        }
        $client->loginUser($user);

        return $client;
    }
}
