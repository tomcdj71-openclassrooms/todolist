<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * This class represents the Security Controller
 * which handles the login and logout actions.
 *
 * @category Controller
 */
final class SecurityController extends AbstractController
{
    /**
     * This method handles the login action and renders the login page.
     *
     * @param AuthenticationUtils $authenticationUtils the
     *                                                 AuthenticationUtils service
     *
     * @return Response the response object
     */
    #[Route('/login', name: 'login')]
    public function loginAction(
        AuthenticationUtils $authenticationUtils
    ): Response {
        $authenticationException = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig',
            [
                'last_username' => $lastUsername,
                'error' => $authenticationException,
            ]
        );
    }

    /**
     * This method handles the logout action and throws a runtime exception.
     *
     * @throws \RuntimeException
     *
     * @codeCoverageIgnore
     */
    #[Route('/logout', name: 'logout')]
    public function logoutAction(): void
    {
        throw new \RuntimeException('Ceci ne devrait pas être exécuté directement.');
    }
}
