<?php

declare(strict_types=1);

namespace App\Tests\Task;

use App\Entity\User;
use App\Tests\WebTestCaseHelperTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ListTest extends WebTestCase
{
    use WebTestCaseHelperTrait;

    public const BASE_URL = 'http://localhost:8000';

    public const LIST_TASK_URL = self::BASE_URL.'/tasks';

    public const TEST_USER_EMAIL = 'alice@gmail.com';

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

    private function setUpClientAndLogin(): \Symfony\Bundle\FrameworkBundle\KernelBrowser
    {
        $client = self::createClient();
        $entityManager = $client
            ->getContainer()
            ->get(EntityManagerInterface::class);
        $user = $entityManager
            ->getRepository(User::class)
            ->findOneBy(
                ['email' => self::TEST_USER_EMAIL]
            );
        $client->loginUser($user);

        return $client;
    }
}
