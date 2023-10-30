<?php

declare(strict_types=1);

namespace App\Tests\User;

use App\Entity\User;
use App\Tests\WebTestCaseHelperTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class UpdateUserTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    private const BASE_URL = 'http://localhost:8000';

    private const EDIT_USER_URL = self::BASE_URL.'/users/1/edit';

    private const TEST_USER_EMAIL = 'alice@gmail.com';

    private const ADMIN_USER_EMAIL = 'john@gmail.com';

    private const SUBMIT_BUTTON = 'Modifier';

    private KernelBrowser $kernelBrowser;

    private EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        $this->kernelBrowser = $this->setUpClientAndLogin(self::ADMIN_USER_EMAIL);
        $entityManager = $this->kernelBrowser->getContainer()->get(EntityManagerInterface::class);
        self::assertNotNull($entityManager);
        self::assertInstanceOf(EntityManagerInterface::class, $entityManager);
        $this->entityManager = $entityManager;
    }

    public function testShouldEditUser(): void
    {
        $this->runUpdateUserTest([
            'email' => self::ADMIN_USER_EMAIL,
            'expectedStatusCode' => Response::HTTP_OK,
            'formData' => $this->createFormData(),
        ]);
    }

    public function testShouldNotEditUser(): void
    {
        $this->runUpdateUserTest([
            'email' => self::TEST_USER_EMAIL,
            'expectedStatusCode' => Response::HTTP_FORBIDDEN,
        ]);
    }

    /**
     * @dataProvider provideInvalidFormData
     *
     * @param array{formData: array<string, string>} $data
     */
    public function testShouldRaiseFormErrors(array $data): void
    {
        $this->runUpdateUserTest([
            'email' => self::ADMIN_USER_EMAIL,
            'expectedStatusCode' => Response::HTTP_OK,
            'formData' => $this->createFormData(),
        ]);
    }

    /**
     * Provides invalid form data for the UpdateUserTest class.
     *
     * @return array<string, array{formData: array<string, string>}>
     */
    public static function provideInvalidFormData(): array
    {
        return [
            'password not match' => [
                'formData' => [
                    'user[username]' => 'testuser',
                    'user[password][first]' => 'testuser',
                    'user[password][second]' => 'testuser2',
                    'user[email]' => 'test@test.com',
                    'user[roles]' => 'ROLE_USER',
                ],
            ],
        ];
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
    private function runUpdateUserTest(array $options): void
    {
        $email = $options['email'] ?? self::ADMIN_USER_EMAIL;
        $expectedStatusCode = $options['expectedStatusCode'] ?? Response::HTTP_OK;
        $formData = $options['formData'] ?? $this->createFormData();

        self::assertIsString($email);
        $this->assertType($expectedStatusCode, 'int');
        /** @var int $expectedStatusCode */
        $this->assertType($formData, 'array');
        /** @var array<string, string> $formData */
        self::ensureKernelShutdown();
        $this->kernelBrowser = $this->setUpClientAndLogin($email);

        $this->kernelBrowser->request(Request::METHOD_GET, self::EDIT_USER_URL);
        self::assertResponseStatusCodeSame($expectedStatusCode);

        if ($expectedStatusCode === Response::HTTP_OK) {
            $this->kernelBrowser->submitForm(self::SUBMIT_BUTTON, $formData);
            $user = $this->entityManager->getRepository(User::class)->find(1);
            self::assertInstanceOf(User::class, $user);
            self::assertEquals($formData['user[username]'], $user->getUsername());
            self::assertEquals($formData['user[email]'], $user->getEmail());
            self::assertEquals($formData['user[roles]'], $user->getRoles()[0]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function createFormData(): array
    {
        return [
            'user[username]' => 'testuser',
            'user[password][first]' => 'testuser',
            'user[password][second]' => 'testuser',
            'user[email]' => 'test@test.com',
            'user[roles]' => 'ROLE_USER',
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
