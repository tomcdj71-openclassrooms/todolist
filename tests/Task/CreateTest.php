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
        $client = $this->setUpClientAndLogin();
        $client->request(
            Request::METHOD_GET,
            self::CREATE_TASK_URL
        );
        self::assertResponseIsSuccessful();
        self::assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );
        $client->submitForm(
            self::SUBMIT_BUTTON,
            self::createFormData()
        );
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $client->followRedirect();
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
     * @dataProvider provideInvalidFormData
     *
     * @param array{
     *      'task[title]': string,
     *      'task[content]': string
     * } $formData
     */
    public function testShouldRaiseFormErrors(array $formData): void
    {
        $client = $this->setUpClientAndLogin();
        $client->request(Request::METHOD_GET, self::CREATE_TASK_URL);
        self::assertResponseIsSuccessful();

        self::assertResponseIsSuccessful();
        $client->followRedirects(false);

        $client->submitForm(
            self::SUBMIT_BUTTON,
            $formData
        );
        self::assertSelectorTextContains('.list-unstyled', '');
        self::assertResponseStatusCodeSame(
            Response::HTTP_OK
        );
    }

    /**
     * @return array<string, array<array-key, array{
     *   parameters: array{
     *     task: array{
     *      title: string,
     *      content: string,
     *  }
     * }
     * }>>
     */
    public static function provideInvalidFormData(): array
    {
        return [
            'blank title' => [
                self::createFormData(title: ''),
            ],
            'blank content' => [
                self::createFormData(content: ''),
            ],
        ];
    }

    /**
     * login and return client.
     *
     * @return object $client
     */
    private function setUpClientAndLogin(): object
    {
        $client = self::createClient();
        $entityManager = $client->getContainer()->get(EntityManagerInterface::class);
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => self::TEST_USER_EMAIL]);
        $client->loginUser($user);

        return $client;
    }

    /**
     * @return array{
     *  parameters: array{
     *   task: array{
     *      title: string,
     *      content: string,
     *      _token: string
     *  }
     * }
     */
    private static function createFormData(string $title = 'Task', string $content = 'Description'): array
    {
        return [
            'task' => [
                'title' => $title,
                'content' => $content,
            ],
        ];
    }
}
