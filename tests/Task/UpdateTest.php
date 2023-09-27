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

    public function testShouldUpdateTaskAndRedirectToShowPage(): void
    {
        $kernelBrowser = $this->setUpClientAndLogin();
        $kernelBrowser->request(
            Request::METHOD_GET,
            self::UPDATE_TASK_URL
        );
        self::assertResponseIsSuccessful();

        $kernelBrowser->submitForm(
            self::SUBMIT_BUTTON,
            $this->createFormData()
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
     *
     * @param array<string, mixed> $formData
     */
    public function testShouldRaiseFormErrors(array $formData): void
    {
        $kernelBrowser = $this->setUpClientAndLogin();
        $kernelBrowser->request(
            Request::METHOD_GET,
            self::UPDATE_TASK_URL
        );
        self::assertResponseIsSuccessful();
        $kernelBrowser->followRedirects(false);

        $kernelBrowser->submitForm(
            self::SUBMIT_BUTTON,
            $formData
        );
        $crawler = $kernelBrowser->getCrawler();
        $alert = $crawler->filter('.alert.alert-danger');
        self::assertCount(1, $alert);
        self::assertStringContainsString("Oops ! La tâche n'a pas été modifiée.", $alert->text());
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
     * @return array<string, string>
     */
    private function createFormData(string $title = 'Task', string $content = 'Description'): array
    {
        return [
            'task[title]' => $title,
            'task[content]' => $content,
        ];
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
