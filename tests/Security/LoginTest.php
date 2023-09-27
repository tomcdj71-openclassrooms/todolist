<?php

declare(strict_types=1);

namespace App\Tests\Security;

use App\Tests\WebTestCaseHelperTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

final class LoginTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    public const BASE_URL = 'http://localhost:8000';

    public const LOGIN_URL = self::BASE_URL.'/login';

    public const GOOD_USERNAME = 'alice';

    public const GOOD_PASSWORD = 'alice';

    public const BAD_USERNAME = 'bad';

    public const BAD_PASSWORD = 'bad';

    public const SUBMIT_BUTTON = 'Se connecter';

    public function testShouldAuthenticatedUserAndRedirectToIndex(): void
    {
        $client = self::createClient();
        $client->request(
            Request::METHOD_GET,
            self::LOGIN_URL
        );
        $client->submitForm(
            self::SUBMIT_BUTTON,
            self::createFormData(
                username: self::GOOD_USERNAME,
                password: self::GOOD_PASSWORD
            )
        );

        self::assertEquals(
            302,
            $client->getResponse()->getStatusCode()
        );
        $client->followRedirect();
        self::assertRouteSame('homepage');
        self::assertIsAuthenticated(
            true,
            $client
        );
    }

    /**
     * @dataProvider provideInvalidFormData
     *
     * @param array{_username: string, _password: string} $formData
     */
    public function testShouldNotAuthenticateUser(array $formData): void
    {
        $client = self::createClient();
        $client->request(
            Request::METHOD_GET,
            self::LOGIN_URL
        );
        $client->submitForm(
            self::SUBMIT_BUTTON,
            $formData
        );

        self::assertEquals(
            302,
            $client->getResponse()->getStatusCode()
        );
        $client->followRedirect();
        self::assertRouteSame('login');
    }

    public function testShouldLogoutUserAndRedirectToLogin(): void
    {
        $client = self::createClient();
        $client->request(
            Request::METHOD_GET,
            self::LOGIN_URL
        );
        $client->submitForm(
            self::SUBMIT_BUTTON,
            self::createFormData(
                username: self::GOOD_USERNAME,
                password: self::GOOD_PASSWORD
            )
        );

        self::assertEquals(
            302,
            $client->getResponse()->getStatusCode()
        );
        $client->followRedirect();
        $client->request(
            Request::METHOD_GET,
            self::BASE_URL.'/logout'
        );
        $client->followRedirect();
        self::assertRouteSame('homepage');
    }

    /**
     * @return array<string, array<array-key, array{_username: string, _password: string}>>
     */
    public static function provideInvalidFormData(): array
    {
        return [
            'invalid username' => [
                self::createFormData(username: self::BAD_USERNAME, password: self::GOOD_PASSWORD),
            ],
            'invalid password' => [
                self::createFormData(username: self::GOOD_USERNAME, password: self::BAD_PASSWORD),
            ],
            'invalid username and password' => [
                self::createFormData(username: self::BAD_USERNAME, password: self::BAD_PASSWORD),
            ],
        ];
    }

    /**
     * @return array{_username: string, _password: string}
     */
    private static function createFormData(
        string $username,
        string $password
    ): array {
        return [
            '_username' => $username,
            '_password' => $password,
        ];
    }
}
