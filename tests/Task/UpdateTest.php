<?php

declare(strict_types=1);

namespace App\Tests\Task;

use App\Entity\User;
use App\Tests\WebTestCaseHelperTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UpdateTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    public const BASE_URL = 'http://localhost:8000';

    public const UPDATE_TASK_URL = self::BASE_URL.'/tasks/1/edit';

    public const TEST_USER_EMAIL = 'john@gmail.com';

    public const WRONG_USER_EMAIL = 'alice@gmail.com';

    public const SUBMIT_BUTTON = 'Modifier';

    /**
     * @param array{
     *      task: array{
     *          title: string,
     *          content: string,
     *   }
     * } $formData
     *
     * @group test
     */
    public function testShouldUpdateTaskAndRedirectToShowPage(): void
    {
        $client = $this->setUpClientAndLogin();
        $client->request(
            Request::METHOD_GET,
            self::UPDATE_TASK_URL
        );
        self::assertResponseIsSuccessful();

        $client->submitForm(
            self::SUBMIT_BUTTON,
            self::createFormData()
        );
        self::assertResponseStatusCodeSame(
            Response::HTTP_FOUND
        );
        // we should have a success message
    }

    /**
     * Unauthenticated users should be redirected to the login page
     * Users that don't have access to this task should be redirected to the login page.
     *
     * @dataProvider provideInvalidFormData
     */
    public function testShouldRaiseFormErrors(array $formData): void
    {
        $client = $this->setUpClientAndLogin();
        $client->request(
            Request::METHOD_GET,
            self::UPDATE_TASK_URL
        );
        self::assertResponseIsSuccessful();
        $client->followRedirects(false);

        $client->submitForm(
            self::SUBMIT_BUTTON,
            $formData
        );
        $crawler = $client->getCrawler();
        $alert = $crawler->filter('.alert.alert-danger');
        self::assertCount(1, $alert);
        self::assertStringContainsString("Oops ! La tâche n'a pas été modifiée.", $alert->text());
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
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::TEST_USER_EMAIL]
            );
        $client->loginUser($user);

        return $client;
    }

    /**
     * @return array{
     *    parameters: array{
     *       task: array{
     *         title: string,
     *         content: string,
     *      }
     *   }
     * }
     */
    private static function createFormData(string $title = 'Task', string $content = 'Description'): array
    {
        return [
            'task[title]' => $title,
            'task[content]' => $content,
        ];
    }
}
