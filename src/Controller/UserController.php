<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Security\UserVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class UserController extends AbstractController
{
    const PASSWORD_NOT_STRING = 'Le mot de passe doit être une chaîne de caractères.';
    const NOT_LOGGED_IN = 'Vous devez être connecté pour accéder à cette page.';
    
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $userPasswordHasher
    ) {
    }

    #[Route('/users', name: 'user_list')]
    #[IsGranted(
        UserVoter::LIST,
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

    #[Route('/users/create', name: 'user_create')]
    public function createAction(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher
    ): Response {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $plaintextPassword = $form
                ->get('password')
                ->getData();
            if (!is_string($plaintextPassword)) {
                throw new \InvalidArgumentException(self::PASSWORD_NOT_STRING);
            }
            $hashedPassword = $userPasswordHasher->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $this->addFlash('success', "L'utilisateur a bien été ajouté.");

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'user/create.html.twig',
            ['form' => $form->createView()]
        );
    }

    #[Route('/users/{id}/edit', name: 'user_edit')]
    #[IsGranted(
        UserVoter::EDIT,
        subject: 'user',
        message: self::NOT_LOGGED_IN,
        statusCode: 404
    )]
    public function editAction(
        User $user,
        Request $request
    ): Response {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $plaintextPassword = $form->get('password')->getData();
            if (!is_string($plaintextPassword)) {
                throw new \InvalidArgumentException(self::PASSWORD_NOT_STRING);
            }

            $hashedPassword = $this->userPasswordHasher
                ->hashPassword($user, $plaintextPassword);
            $user->setPassword($hashedPassword);
            $this->entityManager->flush();
            $this->addFlash('success', "L'utilisateur a bien été modifié");

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
