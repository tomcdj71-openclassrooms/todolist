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

final class DeleteTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    public const BASE_URL = 'http://localhost:8000';
    public const TEST_USER_EMAIL = 'alice@gmail.com';
    public const ADMIN_USER_EMAIL = 'john@gmail.com';

    public function testShouldDeleteTaskAndRedirectToListPage(): void
    {
        $client = $this->setUpClientAndLogin();
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);
        /** @var User|null $user */
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::TEST_USER_EMAIL]
            );
        if (!$user) {
            $this->fail('User not found.');
        }
        /** @var Task|null $task */
        $task = $entityManager
            ->getRepository(Task::class)
            ->findOneBy(
                ['user' => $user->getId()]
            );
        if (!$task) {
            $this->fail('Task not found.');
        }
        $taskUrl = self::BASE_URL.'/tasks/'.$task->getId();
        $client->request(
            Request::METHOD_DELETE,
            $taskUrl.'/delete'
        );
        $client->followRedirects(true);
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $client->request(
            Request::METHOD_GET,
            $taskUrl.'/edit'
        );
        self::assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
        $successMessage = 'La tâche a bien été supprimée.';
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
        /** @var User|null $user */
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::ADMIN_USER_EMAIL]
            );
        if (!$user) {
            $this->fail('User not found.');
        }
        /** @var Task|null $task */
        $task = $entityManager
            ->getRepository(Task::class)
            ->findOneBy(
                ['user' => $user->getId()]
            );
        if (!$task) {
            $this->fail('Task not found.');
        }
        $taskUrl = self::BASE_URL.'/tasks/'.$task->getId();
        $client->request(
            Request::METHOD_DELETE,
            $taskUrl.'/delete'
        );
        $client->followRedirects(true);
        self::assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);
    }

    public function testAdminCanDeleteOtherUserTask(): void
    {
        $client = $this->setUpClientAndLogin(self::ADMIN_USER_EMAIL);
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);
        /** @var User|null $user */
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::TEST_USER_EMAIL]
            );
        if (!$user) {
            $this->fail('User not found.');
        }
        /** @var Task|null $task */
        $task = $entityManager
            ->getRepository(Task::class)
            ->findOneBy(
                ['user' => $user->getId()]
            );
        if (!$task) {
            $this->fail('Task not found.');
        }
        $taskUrl = self::BASE_URL.'/tasks/'.$task->getId();
        $client->request(
            Request::METHOD_DELETE,
            $taskUrl.'/delete'
        );
        $client->followRedirects(true);
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $client->request(
            Request::METHOD_GET,
            $taskUrl.'/edit'
        );
        self::assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
        $successMessage = 'La tâche a bien été supprimée.';
        self::assertFlashBagContains(
            'success',
            $successMessage,
        );
    }

    /**
     * login and return client.
     *
     * @return \Symfony\Bundle\FrameworkBundle\KernelBrowser
     */
    private function setUpClientAndLogin(string $email = self::TEST_USER_EMAIL)
    {
        $client = self::createClient();
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $client->getContainer()->get(EntityManagerInterface::class);
        /** @var User|null $user */
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($user instanceof User) {
            $client->loginUser($user);
        }

        return $client;
    }
}
