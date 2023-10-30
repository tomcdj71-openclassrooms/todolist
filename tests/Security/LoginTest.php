<?php

declare(strict_types=1);

namespace App\Tests\Security;

use App\Tests\WebTestCaseHelperTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * This class represents the test case for the login functionality.
 */
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

    private KernelBrowser $kernelBrowser;

    protected function setUp(): void
    {
        $this->kernelBrowser = self::createClient();
    }

    /**
     * Test if an authenticated user is redirected
     * to the index page after logging in.
     */
    public function testShouldAuthenticateUserAndRedirectToIndex(): void
    {
        $this->runAuthenticateUserTest([
            'username' => self::GOOD_USERNAME,
            'password' => self::GOOD_PASSWORD,
            'expectedStatusCode' => 302,
            'expectedRoute' => 'homepage',
        ]);
    }

    /**
     * @param array{_username: string, _password: string} $formData
     *
     * @dataProvider provideInvalidFormData
     */
    public function testShouldNotAuthenticateUser(array $formData): void
    {
        $this->runAuthenticateUserTest([
            'formData' => $formData,
            'expectedStatusCode' => 302,
            'expectedRoute' => 'login',
        ]);
    }

    /**
     * Test that logs out a user and redirects to the login page.
     */
    public function testShouldLogoutUserAndRedirectToLogin(): void
    {
        $this->runAuthenticateUserTest([
            'username' => self::GOOD_USERNAME,
            'password' => self::GOOD_PASSWORD,
            'expectedStatusCode' => 302,
            'expectedRoute' => 'homepage',
        ]);

        $this->kernelBrowser->request(Request::METHOD_GET, self::BASE_URL.'/logout');
        $this->kernelBrowser->followRedirect();
        self::assertRouteSame('homepage');
    }

    /**
     * This method provides an array of invalid form data for the LoginTest class.
     *
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
     * Helper method to create form data for login tests.
     *
     * @param string $username the username to use in the form data
     * @param string $password the password to use in the form data
     *
     * @return array{_username: string, _password: string}
     *                                                     An array containing the form data
     */
    private static function createFormData(?string $username, ?string $password): array
    {
        return [
            '_username' => $username ?? '',
            '_password' => $password ?? '',
        ];
    }

    /**
     * @param array{
     *     username?: string|null,
     *     password?: string|null,
     *     formData?: array{_username: string, _password: string},
     *     expectedStatusCode?: int,
     *     expectedRoute?: string|null
     * } $options
     */
    private function runAuthenticateUserTest(array $options = []): void
    {
        $username = $options['username'] ?? null;
        $password = $options['password'] ?? null;
        $formData = $options['formData'] ?? self::createFormData($username, $password);
        $expectedStatusCode = $options['expectedStatusCode'] ?? 302;
        $expectedRoute = $options['expectedRoute'] ?? null;

        $this->kernelBrowser->request(Request::METHOD_GET, self::LOGIN_URL);
        $this->kernelBrowser->submitForm(self::SUBMIT_BUTTON, $formData);

        self::assertEquals($expectedStatusCode, $this->kernelBrowser->getResponse()->getStatusCode());
        $this->kernelBrowser->followRedirect();
        if ($expectedRoute !== null) {
            self::assertRouteSame($expectedRoute);
        }
    }
}
