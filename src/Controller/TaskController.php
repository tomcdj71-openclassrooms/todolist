<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use App\Security\TaskVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(
    '/tasks',
    name: 'task_',
)]
final class TaskController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    #[Route(
        '',
        name: 'list'
    )]
    public function listAction(
        TaskRepository $taskRepository
    ): Response {
        if (! $this->isGranted('ROLE_ADMIN')) {
            $user = $this->getUser();
            if ($user instanceof \Symfony\Component\Security\Core\User\UserInterface) {
                $tasks = $taskRepository->findByUser($user);

                return $this->render(
                    'task/list.html.twig',
                    [
                        'tasks' => $tasks,
                    ]
                );
            }
        }

        $tasks = $taskRepository->findAll();

        return $this->render(
            'task/list.html.twig',
            [
                'tasks' => $tasks,
            ]
        );
    }

    #[Route(
        '/create',
        name: 'create',
    )]
    public function createAction(
        Request $request,
        Security $security
    ): Response {
        $task = new Task();
        $form = $this->createForm(
            TaskType::class,
            $task
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $security->getUser();
            if ($user instanceof \Symfony\Component\Security\Core\User\UserInterface) {
                $task->setUser($user);
            }
            $this->entityManager->persist($task);
            $this->entityManager->flush();
            $this->addFlash(
                'success',
                'La tâche a été bien été ajoutée.'
            );

            return $this->redirectToRoute(
                'task_list'
            );
        }

        return $this->render(
            'task/create.html.twig',
            ['form' => $form->createView()]
        );
    }

    #[Route(
        '/{id}/edit',
        name: 'edit',
        methods: ['GET', 'POST']
    )]
    #[IsGranted(
        TaskVoter::OWNER, 
        subject: 'task'
    )]
    public function editAction(
        Task $task,
        Request $request
    ): Response {
        $form = $this->createForm(
            TaskType::class,
            $task
        );
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->entityManager
                    ->persist($task);
                $this->entityManager
                    ->flush();
                $this->addFlash(
                    'success',
                    'La tâche a bien été modifiée.'
                );
            } else {
                $this->addFlash(
                    'error',
                    'La tâche n\'a pas été modifiée.'
                );

                return $this->render('task/edit.html.twig', [
                    'form' => $form->createView(),
                    'task' => $task,
                ]);
            }

            return $this->redirectToRoute(
                'task_list'
            );
        }

        return $this->render(
            'task/edit.html.twig',
            [
                'form' => $form->createView(),
                'task' => $task,
            ]
        );
    }

    #[Route(
        '/{id}/toggle',
        name: 'toggle',
        methods: ['POST']
    )]
    #[IsGranted(
        TaskVoter::OWNER, 
        subject: 'task'
    )]
    public function toggleTaskAction(
        Task $task
    ): Response {
        $isDone = $task->isDone() !== true;
        $task->toggle($isDone);
        $this->entityManager->flush();
        $message = $isDone ? sprintf(
            'La tâche %s a bien été marquée comme terminée.',
            $task->getTitle()
        ) : sprintf(
            'La tâche %s a bien été marquée comme non-terminée.',
            $task->getTitle()
        );
        $this->addFlash(
            'success',
            $message
        );

        return $this->redirectToRoute(
            'task_list'
        );
    }

    #[Route(
        '/{id}/delete',
        name: 'delete',
        methods: ['POST', 'DELETE']
    )]
    #[IsGranted(
        TaskVoter::OWNER, 
        subject: 'task'
    )]
    public function deleteTaskAction(
        Task $task
    ): Response
    {
        $this->entityManager->remove($task);
        $this->entityManager->flush();
        $this->addFlash(
            'success', 
            'La tâche a bien été supprimée.'
        );

        return $this->redirectToRoute(
            'task_list'
        );
    }

    #[Route(
        '/done',
        name: 'list_done'
    )]
    public function listTasksDone(
        TaskRepository $taskRepository
    ): Response {
        $tasks = [];

        if ($this->isGranted('ROLE_USER')) {
            $user = $this->getUser();
            if ($user instanceof \Symfony\Component\Security\Core\User\UserInterface) {
                $tasks = $taskRepository
                            ->findByUserAndStatus($user);
            }
            return $this->render(
                'task/list_done.html.twig', 
                ['tasks' => $tasks]
            );
        }

        $tasks = $taskRepository
                    ->findByStatus(true);

        return $this->render(
            'task/list_done.html.twig', 
            ['tasks' => $tasks]
        );
    }
}
