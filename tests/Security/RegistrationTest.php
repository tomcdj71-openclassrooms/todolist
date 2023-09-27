<?php

declare(strict_types=1);

namespace App\Tests\Security;

use App\Entity\User;
use App\Tests\WebTestCaseHelperTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class RegistrationTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    public const BASE_URL = 'http://localhost:8000';

    public const REGISTER_URL = self::BASE_URL.'/users/create';

    public const SUBMIT_BUTTON = 'Ajouter';

    public const TEST_USER = [
        'username' => 'user',
        'password' => 'password',
        'email' => 'test@email.com',
        'roles' => ['ROLE_USER'],
    ];

    public const TEST_ADMIN = [
        'username' => 'john',
        'password' => 'john',
        'email' => 'john@gmail.com',
        'roles' => ['ROLE_ADMIN'],
    ];

    public function testShouldRegisterUserAndRedirectToIndex(): void
    {
        $client = self::createClient();
        $client->request(
            Request::METHOD_GET,
            self::REGISTER_URL
        );

        $client->submitForm(
            self::SUBMIT_BUTTON,
            self::createFormData()
        );

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);

        /** @var UserPasswordHasherInterface $passwordHasher */
        $passwordHasher = $client
            ->getContainer()
            ->get(UserPasswordHasherInterface::class);

        /** @var ?User $user */
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::TEST_USER['email']]
            );

        self::assertResponseStatusCodeSame(
            Response::HTTP_FOUND
        );
        self::assertResponseRedirects('/');
        self::assertNotNull($user);
        self::assertTrue(
            $passwordHasher
                ->isPasswordValid(
                    $user,
                    self::TEST_USER['password']
                )
        );
        self::assertSame(
            'user',
            $user->getUsername()
        );
        self::assertSame(
            self::TEST_USER['email'],
            $user->getEmail()
        );
    }

    /**
     * @dataProvider provideInvalidFormData
     *
     * @param array<string, mixed> $formData
     */
    public function testShouldRaiseFormErrors(array $formData): void
    {
        $client = self::createClient();
        $client->request(
            Request::METHOD_GET,
            self::REGISTER_URL
        );
        $client->submitForm(
            self::SUBMIT_BUTTON,
            $formData
        );
        self::assertSelectorExists(
            'h1',
            'Créer un utilisateur'
        );
    }

    public function testShouldRaiseUsernameAlreadyUsedError(): void
    {
        $client = self::createClient();
        $client->request(
            Request::METHOD_GET,
            self::REGISTER_URL
        );
        $client->submitForm(
            self::SUBMIT_BUTTON,
            self::createFormData(
                self::TEST_ADMIN['username']
            ),
        );
        self::assertSelectorExists(
            'h1',
            'Créer un utilisateur'
        );
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public static function provideInvalidFormData(): array
    {
        return [
            'blank username' => [
                'data' => self::createFormData(username: ''),
            ],
            'blank password' => [
                'data' => self::createFormData(password: ''),
            ],
            'blank email' => [
                'data' => self::createFormData(email: ''),
            ],
            'invalid email' => [
                'data' => self::createFormData(email: 'nope'),
            ],
        ];
    }

    /**
     * @param array<string> $roles
     *
     * @return array<string, mixed>
     */
    private static function createFormData(
        string $username = self::TEST_USER['username'],
        string $password = self::TEST_USER['password'],
        string $email = self::TEST_USER['email'],
        array $roles = self::TEST_USER['roles']
    ): array {
        return [
            'user[username]' => $username,
            'user[password][first]' => $password,
            'user[password][second]' => $password,
            'user[email]' => $email,
            'user[roles]' => $roles[0],
        ];
    }
}
