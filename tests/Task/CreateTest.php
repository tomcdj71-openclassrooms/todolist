<?php

declare(strict_types=1);

namespace App\Tests\Task;

use App\Entity\User;
use App\Tests\WebTestCaseHelperTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    public const BASE_URL = 'http://localhost:8000';

    public const CREATE_TASK_URL = self::BASE_URL.'/tasks/create';

    public const TEST_USER_EMAIL = 'alice@gmail.com';

    public const SUBMIT_BUTTON = 'Ajouter';

    public function testShouldCreateTaskAndRedirectToShowPage(): void
    {
        $kernelBrowser = $this->setUpClientAndLogin();
        $kernelBrowser->request(
            Request::METHOD_GET,
            self::CREATE_TASK_URL
        );
        self::assertResponseIsSuccessful();
        self::assertEquals(
            200,
            $kernelBrowser->getResponse()->getStatusCode()
        );
        $kernelBrowser->submitForm(
            self::SUBMIT_BUTTON,
            $this->createFormData()
        );
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $kernelBrowser->followRedirect();
        $successMessage = 'La tâche a été bien été ajoutée.';
        self::assertSelectorTextContains(
            'div.alert.alert-success',
            $successMessage
        );
    }

    public function testShouldRaiseHttpAccessDeniedAndRedirectToLogin(): void
    {
        $client = self::createClient();
        $client->request(Request::METHOD_GET, self::CREATE_TASK_URL);
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        self::assertResponseRedirects(self::BASE_URL.'/login');
        $client->followRedirect();
        self::assertSelectorTextContains('h1', 'Connexion');
    }

    /**
     * Unauthenticated users should be redirected to the login page
     * Users that don't have access to this task should be redirected to the login page.
     *
     * @dataProvider provideInvalidFormData
     *
     * @param array<string, mixed> $formData
     */
    public function testShouldRaiseFormErrors(array $formData): void
    {
        $kernelBrowser = $this->setUpClientAndLogin();
        $kernelBrowser->request(Request::METHOD_GET, self::CREATE_TASK_URL);
        self::assertResponseIsSuccessful();

        self::assertResponseIsSuccessful();
        $kernelBrowser->followRedirects(false);

        $kernelBrowser->submitForm(
            self::SUBMIT_BUTTON,
            $formData
        );
        self::assertSelectorTextContains('.list-unstyled', '');
        self::assertResponseStatusCodeSame(
            Response::HTTP_OK
        );
    }

    /**
     * @return array<string, array{array<string, string>}>
     */
    public static function provideInvalidFormData(): array
    {
        return [
            'blank title' => [
                [
                    'task[title]' => '',
                    'task[content]' => 'Description',
                ],
            ],
            'blank content' => [
                [
                    'task[title]' => 'Task',
                    'task[content]' => '',
                ],
            ],
        ];
    }

    /**
     * login and return client.
     *
     * @return \Symfony\Bundle\FrameworkBundle\KernelBrowser
     */
    private function setUpClientAndLogin()
    {
        $client = self::createClient();
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $client->getContainer()->get(EntityManagerInterface::class);
        /** @var User|null $user */
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => self::TEST_USER_EMAIL]);
        if ($user instanceof User) {
            $client->loginUser($user);
        }

        return $client;
    }

    /**
     * @return array{
     *   task: array{
     *      title: string,
     *      content: string
     *  }
     * }
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
}
