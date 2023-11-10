<?php

declare(strict_types=1);

namespace App\Tests\User;

use App\Tests\WebTestCaseHelperTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CreateUserTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    private const BASE_URL = 'http://localhost:8000';

    private const CREATE_USER_URL = self::BASE_URL.'/users/create';

    private const TEST_USER_EMAIL = 'test@test.com';

    private const SUBMIT_BUTTON = 'Ajouter';

    private KernelBrowser $kernelBrowser;

    protected function setUp(): void
    {
        $this->kernelBrowser = $this->setUpClient();
    }

    public function testShouldCreateUser(): void
    {
        $this->runCreateUserTest([
            'expectedText' => "L'utilisateur a bien été ajouté.",
            'expectedStatusCode' => Response::HTTP_OK,
        ]);
    }

    /**
     * @dataProvider provideInvalidFormData
     *
     * @param array<string, mixed> $formData
     */
    public function testShouldRaiseFormErrors(array $formData): void
    {
        $this->runCreateUserTest([
            'expectedText' => null,
            'expectedStatusCode' => Response::HTTP_OK,
            'formData' => $formData,
        ]);
    }

    /**
     * @return array<string, array<int, array<string, mixed>>>
     */
    public static function provideInvalidFormData(): array
    {
        return [
            'blank username' => [
                [
                    'user' => [
                        'username' => '',
                        'password' => ['first' => 'password', 'second' => 'password'],
                        'email' => self::TEST_USER_EMAIL,
                        'roles' => 'ROLE_USER'],
                    ],
                ],
            'password not match' => [
                [
                    'user' => [
                        'username' => 'testuser',
                        'password' => [
                            'first' => 'password',
                            'second' => 'password2',
                        ],
                        'email' => self::TEST_USER_EMAIL,
                        'roles' => 'ROLE_USER',
                    ],
                ],
            ],
            'blank email' => [
                [
                    'user' => [
                        'username' => 'testuser',
                        'password' => [
                            'first' => 'password',
                            'second' => 'password',
                        ], 'email' => '',
                        'roles' => 'ROLE_USER',
                    ],
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
    private function runCreateUserTest(array $options): void
    {
        $formData = $options['formData'] ?? [];
        $expectedText = $options['expectedText'] ?? null;
        $expectedStatusCode = ($options['expectedStatusCode'] ?? Response::HTTP_OK);
        $formData = $options['formData'] ?? $this->createFormData();
        $this->assertType($expectedText, 'string');
        /** @var string $expectedText */
        $this->assertType($expectedStatusCode, 'int');
        /** @var int $expectedStatusCode */
        $this->assertType($formData, 'array');
        /** @var array<string, mixed> $formData */
        $this->kernelBrowser->request(Request::METHOD_GET, self::CREATE_USER_URL);
        self::assertResponseStatusCodeSame($expectedStatusCode);
        $this->kernelBrowser->submitForm(self::SUBMIT_BUTTON, $formData);
        if ($expectedText !== null) {
            self::assertSelectorTextContains('div.alert.alert-success', $expectedText);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function createFormData(string $username = 'testuser', string $password = 'password'): array
    {
        return [
            'user' => [
                'username' => $username,
                'password' => [
                    'first' => $password,
                    'second' => $password,
                ],
                'email' => self::TEST_USER_EMAIL,
                'roles' => 'ROLE_USER',
            ],
        ];
    }

    /**
     * return client.
     *
     * @return \Symfony\Bundle\FrameworkBundle\KernelBrowser
     */
    private function setUpClient()
    {
        $kernelBrowser = self::createClient();
        $kernelBrowser->followRedirects();

        return $kernelBrowser;
    }
}
