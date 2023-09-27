<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Security\TaskVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(
    '/users',
    name: 'user_',
)]
final class UserController extends AbstractController
{
    public const PASSWORD_NOT_STRING = 'Le mot de passe doit être une chaîne de caractères.';

    public const NOT_LOGGED_IN = 'Vous devez être connecté pour accéder à cette page.';

    public const NO_ROLE_ATTRIBUTED = 'Aucun rôle n\'a été attribué à l\'utilisateur.';

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $userPasswordHasher
    ) {
    }

    #[Route(
        '/',
        name: 'list'
    )]
    #[IsGranted(
        TaskVoter::OWNER,
        message: self::NOT_LOGGED_IN,
        statusCode: 404
    )]
    public function listAction(): Response
    {
        return $this->render(
            'user/list.html.twig',
            ['users' => $this->entityManager
                ->getRepository(User::class)
                ->findAll(),
            ]
        );
    }

    #[Route(
        '/create',
        name: 'create'
    )]
    public function createAction(
        Request $request
    ): Response {
        $user = new User();
        $form = $this->createForm(
            UserType::class,
            $user
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $plaintextPassword = $form
                ->get('password')
                ->getData();
            if (! is_string($plaintextPassword)) {
                throw new \InvalidArgumentException(self::PASSWORD_NOT_STRING);
            }

            // if no roles are set, throw an exception
            if ($user->getRoles() === []) {
                throw new \InvalidArgumentException(self::NO_ROLE_ATTRIBUTED);
            }

            $hashedPassword = $this->userPasswordHasher
                ->hashPassword(
                    $user,
                    $plaintextPassword
                );
            $user->setPassword($hashedPassword);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $this->addFlash(
                'success',
                "L'utilisateur a bien été ajouté."
            );

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'user/create.html.twig',
            ['form' => $form->createView()]
        );
    }

    #[Route(
        '/{id}/edit',
        name: 'edit'
    )]
    #[IsGranted(
        TaskVoter::OWNER,
        message: self::NOT_LOGGED_IN,
        statusCode: 404
    )]
    public function editAction(
        User $user,
        Request $request
    ): Response {
        $form = $this->createForm(
            UserType::class,
            $user
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $plaintextPassword = $form->get('password')->getData();
            if (! is_string($plaintextPassword)) {
                throw new \InvalidArgumentException(self::PASSWORD_NOT_STRING);
            }

            $hashedPassword = $this->userPasswordHasher
                ->hashPassword(
                    $user,
                    $plaintextPassword
                );
            $user->setPassword($hashedPassword);
            $this->entityManager->flush();
            $this->addFlash(
                'success',
                "L'utilisateur a bien été modifié"
            );

            return $this->redirectToRoute('user_list');
        }

        return $this->render(
            'user/edit.html.twig',
            ['form' => $form->createView(),
                'user' => $user,
            ]
        );
    }
}
