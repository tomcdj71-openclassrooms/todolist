<?php

declare(strict_types=1);

namespace App\Tests\Task;

use App\Entity\Task;
use App\Entity\User;
use App\Tests\WebTestCaseHelperTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ToggleTaskTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    private const BASE_URL = 'http://localhost:8000';

    private const TEST_USER_EMAIL = 'alice@gmail.com';

    private const ADMIN_USER_EMAIL = 'john@gmail.com';

    private KernelBrowser $kernelBrowser;

    private EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        $this->kernelBrowser = $this->setUpClientAndLogin(self::TEST_USER_EMAIL);
        $entityManager = $this->kernelBrowser->getContainer()->get(EntityManagerInterface::class);
        if (!$entityManager instanceof EntityManagerInterface) {
            throw new \RuntimeException('Could not get entity manager.');
        }

        $this->entityManager = $entityManager;
        self::assertInstanceOf(EntityManagerInterface::class, $this->entityManager);
    }

    public function testShouldToggleTask(): void
    {
        $this->runToggleTaskTest([
            'email' => self::TEST_USER_EMAIL,
        ]);
    }

    public function testShouldRaiseHttpAccessDenied(): void
    {
        [$user, $task] = $this->fetchUserAndTask(self::ADMIN_USER_EMAIL);
        $this->toggleTask($task);
        self::assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);
    }

    public function testAdminCanToggleOtherUserTask(): void
    {
        self::ensureKernelShutdown();
        $this->setUpClientAndLogin(self::ADMIN_USER_EMAIL);
        $this->runToggleTaskTest([
            'email' => self::TEST_USER_EMAIL,
        ]);
    }

    /**
     * @param array<string, mixed> $options
     */
    private function runToggleTaskTest(array $options): void
    {
        $email = $options['email'] ?? self::TEST_USER_EMAIL;
        self::assertIsString($email);
        [$user, $task] = $this->fetchUserAndTask($email);
        $this->toggleTask($task);
        $this->entityManager->refresh($task);

        self::assertFlashBagContains(
            'success',
            sprintf(
                'La tâche %s a bien été marquée comme %s.',
                $task->getTitle(),
                $task->isDone() ? 'terminée' : 'non-terminée'
            )
        );
    }

    private function toggleTask(Task $task): void
    {
        $taskUrl = self::BASE_URL.'/tasks/'.$task->getId();
        $this->kernelBrowser->request(Request::METHOD_POST, $taskUrl.'/toggle');
    }

    /**
     * @return array{0: User, 1: Task}
     */
    private function fetchUserAndTask(string $email): array
    {
        /** @var User|null $user */
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        self::assertInstanceOf(User::class, $user);

        /** @var Task|null $task */
        $task = $this->entityManager->getRepository(Task::class)->findOneBy(['user' => $user->getId()]);
        self::assertInstanceOf(Task::class, $task);

        return [$user, $task];
    }

    /**
     * login and return client.
     */
    private function setUpClientAndLogin(string $email = self::TEST_USER_EMAIL): KernelBrowser
    {
        $this->kernelBrowser = self::createClient();
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->kernelBrowser->getContainer()->get(EntityManagerInterface::class);
        /** @var User|null $user */
        $user = $entityManager->getRepository(User::class)->findOneBy(
            ['email' => $email]
        );
        self::assertInstanceOf(User::class, $user);
        $this->kernelBrowser->loginUser($user);

        return $this->kernelBrowser;
    }
}
