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

final class CreateTaskTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    private const BASE_URL = 'http://localhost:8000';

    private const CREATE_TASK_URL = self::BASE_URL.'/tasks/create';

    private const TEST_USER_EMAIL = 'alice@gmail.com';

    private const SUBMIT_BUTTON = 'Ajouter';

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

    public function testShouldCreateTaskAndRedirectToShowPage(): void
    {
        $this->runCreateTaskTest();
    }

    public function testShouldRaiseHttpAccessDeniedAndRedirectToLogin(): void
    {
        self::ensureKernelShutdown();
        $this->kernelBrowser = self::createClient();
        $this->kernelBrowser->request(Request::METHOD_GET, self::CREATE_TASK_URL);
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        self::assertResponseRedirects(self::BASE_URL.'/login');
        $this->kernelBrowser->followRedirect();
        self::assertSelectorTextContains('h1', 'Connexion');
    }

    /**
     * @param array{task: array{title: string, content: string}} $formData
     *
     * @dataProvider provideInvalidFormData
     */
    public function testShouldRaiseFormErrors(array $formData): void
    {
        $this->kernelBrowser->request(Request::METHOD_GET, self::CREATE_TASK_URL);
        self::assertResponseIsSuccessful();
        $this->kernelBrowser->submitForm(self::SUBMIT_BUTTON, $formData);
        self::assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    /**
     * @return array<string, array{task: array{title: string, content: string}}[]>
     */
    public static function provideInvalidFormData(): array
    {
        return [
            'blank title' => [
                [
                    'task' => [
                        'title' => '',
                        'content' => 'Description',
                    ],
                ],
            ],
            'blank content' => [
                [
                    'task' => [
                        'title' => 'Task',
                        'content' => '',
                    ],
                ],
            ],
        ];
    }

    private function runCreateTaskTest(): void
    {
        $this->kernelBrowser->request(Request::METHOD_GET, self::CREATE_TASK_URL);
        self::assertResponseIsSuccessful();
        $this->kernelBrowser->submitForm(self::SUBMIT_BUTTON, $this->createFormData());
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $this->kernelBrowser->followRedirect();
        self::assertSelectorTextContains('.alert-success', 'tâche a été bien été ajoutée.');

        $newTask = $this->entityManager->getRepository(Task::class)->findOneBy(['title' => 'Task']);
        self::assertNotNull($newTask);
        self::assertInstanceOf(\DateTimeImmutable::class, $newTask->getCreatedAt());
    }

    /**
     * @return array{task: array{title: string, content: string}}
     */
    private function createFormData(string $title = 'Task', string $content = 'Description'): array
    {
        return [
            'task' => [
                'title' => $title,
                'content' => $content,
            ],
        ];
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
        $user = $entityManager->getRepository(User::class)->findOneBy(
            ['email' => $email]
        );
        self::assertInstanceOf(User::class, $user);
        $kernelBrowser->loginUser($user);

        return $kernelBrowser;
    }
}
