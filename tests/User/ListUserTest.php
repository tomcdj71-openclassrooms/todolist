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

final class ListUserTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    private const BASE_URL = 'http://localhost:8000';

    private const LIST_USERS_URL = self::BASE_URL.'/users/';

    private const TEST_USER_EMAIL = 'alice@gmail.com';

    private const ADMIN_USER_EMAIL = 'john@gmail.com';

    private KernelBrowser $kernelBrowser;

    protected function setUp(): void
    {
        $this->kernelBrowser = $this->setUpClientAndLogin(self::ADMIN_USER_EMAIL);
    }

    public function testShouldListUsers(): void
    {
        $this->runListUserTest([
            'expectedText' => 'Liste des utilisateurs',
            'expectedStatusCode' => Response::HTTP_OK,
        ]);
    }

    public function testShouldNotListUsersAndRedirectToLogin(): void
    {
        self::ensureKernelShutdown();
        $this->kernelBrowser = self::createClient();
        $this->runListUserTest([
            'expectedText' => null,
            'expectedStatusCode' => Response::HTTP_FOUND,
            'expectedRedirectUrl' => self::BASE_URL.'/login',
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
            /** @var $type $$value */
        }
    }

    /**
     * @param array<string, mixed> $options
     */
    private function runListUserTest(array $options): void
    {
        $expectedText = $options['expectedText'] ?? null;
        $expectedStatusCode = $options['expectedStatusCode'] ?? Response::HTTP_OK;
        $expectedRedirectUrl = $options['expectedRedirectUrl'] ?? null;
        $this->assertType($expectedStatusCode, 'int');
        /** @var int $expectedStatusCode */
        $this->assertType($expectedText, 'string');
        /** @var string|null $expectedText */
        $this->assertType($expectedRedirectUrl, 'string');
        /** @var string|null $expectedRedirectUrl */
        $this->kernelBrowser->request(Request::METHOD_GET, self::LIST_USERS_URL);
        self::assertResponseStatusCodeSame($expectedStatusCode);
        if ($expectedText !== null && $expectedText !== '') {
            self::assertSelectorTextContains('h1', $expectedText);
        }

        if ($expectedRedirectUrl === null) {
            return;
        }

        if ($expectedRedirectUrl === '') {
            return;
        }

        self::assertResponseRedirects($expectedRedirectUrl);
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
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        self::assertInstanceOf(User::class, $user);
        $kernelBrowser->loginUser($user);

        return $kernelBrowser;
    }
}
