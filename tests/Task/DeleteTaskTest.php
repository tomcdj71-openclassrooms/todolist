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

final class DeleteTaskTest extends WebTestCase
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
        self::assertNotNull($entityManager);
        self::assertInstanceOf(EntityManagerInterface::class, $entityManager);
        $this->entityManager = $entityManager;
    }

    public function testShouldDeleteTaskAndRedirectToListPage(): void
    {
        $this->runDeleteTaskTest([
            'email' => self::TEST_USER_EMAIL,
            'expectedStatusCode' => Response::HTTP_FOUND,
        ]);
    }

    public function testShouldRaiseHttpAccessDenied(): void
    {
        $this->runDeleteTaskTest([
            'email' => self::ADMIN_USER_EMAIL,
            'expectedStatusCode' => Response::HTTP_FORBIDDEN,
        ]);
    }

    public function testAdminCanDeleteOtherUserTask(): void
    {
        self::ensureKernelShutdown();
        $this->kernelBrowser = $this->setUpClientAndLogin(self::ADMIN_USER_EMAIL);
        $this->runDeleteTaskTest([
            'email' => self::TEST_USER_EMAIL,
            'expectedStatusCode' => Response::HTTP_FOUND,
        ]);
    }

    /**
     * @param array<string, mixed> $options
     */
    private function runDeleteTaskTest(array $options): void
    {
        $email = $options['email'] ?? self::TEST_USER_EMAIL;
        $expectedStatusCode = $options['expectedStatusCode'] ?? Response::HTTP_OK;

        self::assertIsString($email);
        [$user, $task] = $this->fetchUserAndTask($email);
        $taskUrl = self::BASE_URL.'/tasks/'.$task->getId();
        $this->kernelBrowser->request(Request::METHOD_DELETE, $taskUrl.'/delete');
        self::assertIsInt($expectedStatusCode);
        self::assertResponseStatusCodeSame($expectedStatusCode);

        if ($expectedStatusCode === Response::HTTP_FOUND) {
            $this->kernelBrowser->followRedirects(true);
            $this->kernelBrowser->request(Request::METHOD_GET, $taskUrl.'/edit');
            self::assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
            self::assertFlashBagContains('success', 'La tâche a bien été supprimée.');
        }
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
     *
     * @return \Symfony\Bundle\FrameworkBundle\KernelBrowser
     */
    private function setUpClientAndLogin(string $email = self::TEST_USER_EMAIL)
    {
        $kernelBrowser = self::createClient();
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $kernelBrowser->getContainer()->get(EntityManagerInterface::class);
        /** @var User|null $user */
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        self::assertInstanceOf(User::class, $user);
        $kernelBrowser->loginUser($user);

        return $kernelBrowser;
    }
}
