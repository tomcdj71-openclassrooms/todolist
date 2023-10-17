<?php

declare(strict_types=1);

namespace App\Tests\Task;

use App\Entity\User;
use App\Tests\WebTestCaseHelperTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * This class represents the test case for the List functionality.
 */
final class ListTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    public const BASE_URL = 'http://localhost:8000';

    public const LIST_TASK_URL = self::BASE_URL.'/tasks';

    public const TEST_USER_EMAIL = 'alice@gmail.com';

    /**
     * Test the list task page.
     */
    public function testShouldListTasks(): void
    {
        $kernelBrowser = $this->setUpClientAndLogin();
        $kernelBrowser->request(
            Request::METHOD_GET,
            self::LIST_TASK_URL
        );
        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains(
            'h2',
            "Liste de l'ensemble de vos tâches"
        );
    }

    /**
     * Unauthenticated users should be redirected to the login page.
     */
    public function testShouldRaiseHttpAccessDeniedAndRedirectToLogin(): void
    {
        $client = self::createClient();
        $client->request(
            Request::METHOD_GET,
            self::LIST_TASK_URL
        );
        self::assertResponseStatusCodeSame(
            Response::HTTP_FOUND
        );
        self::assertResponseRedirects(
            self::BASE_URL.'/login'
        );
    }

    /**
     * Login and return client.
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
