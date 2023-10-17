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

/**
 * This class represents the test case for the Registration functionality.
 */
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

    /**
     * Test the registration page.
     * The user should be redirected to the login page.
     */
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

    /**
     * Test if submitting a registration form
     * with an already used username raises an error.
     */
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
     * Provides invalid form data for the registration form.
     *
     * @return array<string, array<string, mixed>> an array of invalid form data
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
     * Creates form data for user registration.
     *
     * @param string        $username the username of the user
     * @param string        $password the password of the user
     * @param string        $email    the email of the user
     * @param array<string> $roles    the roles of the user
     *
     * @return array<string, mixed> the form data for user registration
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
