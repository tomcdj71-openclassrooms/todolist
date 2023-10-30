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

final class UpdateTaskTest extends WebTestCase
{
    use WebTestCaseHelperTrait;
    public const BASE_URL = 'http://localhost:8000';

    public const UPDATE_TASK_URL = self::BASE_URL.'/tasks/1/edit';

    public const TEST_USER_EMAIL = 'john@gmail.com';

    public const WRONG_USER_EMAIL = 'alice@gmail.com';

    public const SUBMIT_BUTTON = 'Modifier';

    private KernelBrowser $kernelBrowser;

    protected function setUp(): void
    {
        $this->kernelBrowser = $this->setUpClientAndLogin(self::TEST_USER_EMAIL);
    }

    /**
     * Test the update task page.
     * The user should be redirected to the task page.
     */
    public function testShouldUpdateTaskAndRedirectToShowPage(): void
    {
        $this->runUpdateTaskTest();
    }

    /**
     * Unauthenticated users should be redirected to the login page
     * Users that don't have access to this task should be redirected
     * To the login page.
     *
     * @param array<string, mixed>         $formData
     * @param array<string, array<string>> $expectedErrors
     *
     * @dataProvider provideInvalidFormData
     */
    public function testShouldRaiseFormErrors(array $formData, array $expectedErrors): void
    {
        $this->runUpdateTaskTest([
            'expectedStatusCode' => Response::HTTP_OK,
            'formData' => $formData,
            'expectedErrors' => $expectedErrors,
        ]);
    }

    /**
     * @param $value mixed
     * @param $type  string
     */
    private function assertType(mixed $value, string $type): void
    {
        if ($value !== null) {
            $assertionMethod = 'assertIs'.ucfirst($type);
            self::$assertionMethod($value);
            /** @var $type $value */
        }
    }

    /**
     * @param array<string, mixed> $options
     */
    private function runUpdateTaskTest(array $options = []): void
    {
        $expectedStatusCode = $options['expectedStatusCode'] ?? Response::HTTP_FOUND;
        $expectedSuccessMessage = $options['expectedSuccessMessage'] ?? 'La tâche a bien été modifiée.';
        $formData = $options['formData'] ?? $this->createFormData();
        $expectedErrors = $options['expectedErrors'] ?? [];

        $this->assertType($expectedStatusCode, 'int');
        /** @var int $expectedStatusCode */
        $this->assertType($expectedSuccessMessage, 'string');
        /** @var string $expectedSuccessMessage */
        $this->assertType($formData, 'array');
        /** @var array<string, string> $formData */
        $this->assertType($expectedErrors, 'array');
        /** @var array<string, array<string>> $expectedErrors */
        $this->kernelBrowser->request(Request::METHOD_GET, self::UPDATE_TASK_URL);
        self::assertResponseIsSuccessful();

        $this->kernelBrowser->submitForm(self::SUBMIT_BUTTON, $formData);
        self::assertResponseStatusCodeSame($expectedStatusCode);

        if ($expectedStatusCode === Response::HTTP_FOUND) {
            $this->kernelBrowser->followRedirect();
            self::assertSelectorTextContains('div.alert.alert-success', $expectedSuccessMessage);
        } elseif ($expectedStatusCode === Response::HTTP_OK) {
            $crawler = $this->kernelBrowser->getCrawler();
            foreach ($expectedErrors as $field => $messages) {
                $this->assertType($messages, 'array');
                $errorsList = $crawler->filter(sprintf('#%s + .help-block ul.list-unstyled li', $field));
                self::assertEquals(count($messages), $errorsList->count());
                foreach ($messages as $message) {
                    $this->assertType($message, 'string');
                    self::assertSelectorTextContains(sprintf('#%s + .help-block ul.list-unstyled', $field), $message);
                }
            }
        }
    }

    /**
     * Provides invalid form data for the UpdateTaskTest class.
     *
     * @return array<string, array{array<string, string>, array<string, array<string>>}>
     */
    public static function provideInvalidFormData(): array
    {
        return [
            'blank title' => [
                [
                    'task[title]' => '',
                    'task[content]' => 'Description',
                ],
                [
                    'task_title' => [
                        'Vous devez saisir un titre.',
                        'Le titre doit contenir au moins 3 caractères.',
                    ],
                ],
            ],
            'blank content' => [
                [
                    'task[title]' => 'Task',
                    'task[content]' => '',
                ],
                [
                    'task_content' => [
                        'Vous devez saisir du contenu.',
                        'Le contenu doit contenir au moins 3 caractères.',
                    ],
                ],
            ],
            'too short title' => [
                [
                    'task[title]' => 'Ta',
                    'task[content]' => 'Description',
                ],
                [
                    'task_title' => [
                        'Le titre doit contenir au moins 3 caractères.',
                    ],
                ],
            ],
            'too short content' => [
                [
                    'task[title]' => 'Task',
                    'task[content]' => 'De',
                ],
                [
                    'task_content' => [
                        'Le contenu doit contenir au moins 3 caractères.',
                    ],
                ],
            ],
            'blank title and content' => [
                [
                    'task[title]' => '',
                    'task[content]' => '',
                ],
                [
                    'task_title' => [
                        'Vous devez saisir un titre.',
                        'Le titre doit contenir au moins 3 caractères.',
                    ],
                    'task_content' => [
                        'Vous devez saisir du contenu.',
                        'Le contenu doit contenir au moins 3 caractères.',
                    ],
                ],
            ],
        ];
    }

    /**
     * This method provides an array of valid form data for the UpdateTest class.
     *
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
