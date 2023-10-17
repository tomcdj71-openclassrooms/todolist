<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Handler\UserHandler;
use App\Security\TaskVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(
    '/users',
    name: 'user_',
)]
/**
 * This class represents the controller for user-related actions.
 * 
 * @category Controller
 */
final class UserController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly UserHandler $userHandler
    ) {
    }

    #[Route('/', name: 'list')]
    #[IsGranted(
        TaskVoter::OWNER,
        message: 'Vous devez être connecté pour accéder à cette page.',
        statusCode: 404
    )]
    /**
     * Returns the list of users.
     *
     * @return Response the HTTP response
     */
    public function listAction(): Response
    {
        return $this->render(
            'user/list.html.twig',
            ['users' => $this->entityManager->getRepository(User::class)->findAll()]
        );
    }

    /**
     * Creates a new user.
     *
     * @param Request $request the HTTP request
     *
     * @return Response the HTTP response
     */
    #[Route('/create', name: 'create')]
    public function createAction(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('password')->getData();
            $this->userHandler->manageUser($user, $plainPassword);
            $this->addFlash('success', "L'utilisateur a bien été ajouté.");

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'user/create.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * Edit a user.
     *
     * @param User    $user    the user to edit
     * @param Request $request the HTTP request
     *
     * @return Response the HTTP response
     */
    #[Route('/{id}/edit', name: 'edit')]
    public function editAction(User $user, Request $request): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('password')->getData();
            $this->userHandler->manageUser($user, $plainPassword);
            $this->addFlash('success', "L'utilisateur a bien été modifié");

            return $this->redirectToRoute('user_list');
        }

        return $this->render(
            'user/edit.html.twig',
            [
                'form' => $form->createView(),
                'user' => $user,
            ]
        );
    }
}
