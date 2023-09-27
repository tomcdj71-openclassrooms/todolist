<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector;
use Symfony\Component\HttpKernel\Profiler\Profile;

/**
 * Trait WebTestCaseHelperTrait.
 *
 * Méthodes utilitaires pour faciliter tests WebTestCase.
 */
trait WebTestCaseHelperTrait
{
    /**
     * Assertion que le flashbag contient le message attendu.
     *
     * @param string $type    Le type de message (success, error, warning, info, etc.)
     * @param string $message le message à rechercher dans le flashbag
     */
    public function assertFlashBagContains(string $type, string $message): void
    {
        // Récupération des messages flash du type demandé
        $flashMessages = self::getClient()
            ->getRequest()
            ->getSession()
            ->getFlashBag()
            ->get($type);

        // Assertion que le message est bien présent dans le flashbag
        self::assertContains(
            $message,
            $flashMessages
        );
    }

    /**
     * Assertion que l'utilisateur est authentifié ou non.
     *
     * @param bool $isAuthenticated true si l'utilisateur est authentifié, False sinon
     */
    public static function assertIsAuthenticated(bool $isAuthenticated, KernelBrowser $kernelBrowser): void
    {
        // Récupération du profile du client
        /** @var Profile $profile */
        $profile = $kernelBrowser->getProfile();

        // Récupération du collecteur de données de sécurité
        $collector = $profile->getCollector('security');

        // Assertion que le collector est une instance de SecurityDataCollector
        self::assertInstanceOf(
            SecurityDataCollector::class,
            $collector
        );

        // Assertion que l'utilisateur est authentifié ou non
        $isCollectorAuthenticated = $collector->isAuthenticated();
        self::assertSame(
            $isAuthenticated,
            $isCollectorAuthenticated
        );
    }

    /**
     * Retrouve le client.
     *
     * @return KernelBrowser le client pour faire des requêtes HTTP
     */
    private static function getClient(): KernelBrowser
    {
        // Appel à la réflexion pour accéder à la méthode getClient protégée à partir de WebTestCase
        $reflectionMethod = new \ReflectionMethod(
            WebTestCase::class,
            'getClient'
        );

        // Appel dela méthode getClient pour y ajouter l'instance de KernelBrowser
        /* @var KernelBrowser $kernel */
        return $reflectionMethod->invoke(null);
    }
}
