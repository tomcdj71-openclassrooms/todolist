<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Security\TaskVoter;
use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(
    '/tasks',
    name: 'task_',
)]
final class TaskController extends AbstractController
{
    public function __construct(
        private readonly TaskService $taskService
    ) {
    }

    #[Route(
        '',
        name: 'list'
    )]
    public function listAction(): Response
    {
        $user = $this->getUser();
        $tasks = $this->taskService->getTasks($user instanceof UserInterface ? $user : null);

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
    ): Response {
        $task = new Task();
        $form = $this->createForm(
            TaskType::class,
            $task
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->taskService
                ->saveTask(
                    $task,
                    $this->getUser()
                );
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
                $this->taskService->saveTask($task);
                $this->addFlash('success', 'La tâche a bien été modifiée.');

                return $this->redirectToRoute('task_list');
            }

            $this->addFlash('error', 'La tâche n\'a pas été modifiée.');
        }

        return $this->render(
            'task/edit.html.twig',
            ['form' => $form->createView(), 'task' => $task]
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
        $this->taskService->toggleTask($task);
        $this->addFlash(
            'success',
            sprintf(
                'La tâche %s a bien été marquée comme %s.',
                $task->getTitle(),
                $task->isDone() === true
            ? 'terminée'
            : 'non-terminée'
            )
        );

        return $this->redirectToRoute('task_list');
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
    ): Response {
        $this->taskService
            ->deleteTask($task);
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
    public function listTasksDone(): Response
    {
        $user = $this->getUser();
        $tasks = $this->taskService
            ->getDoneTasks(
                $user instanceof UserInterface
                ? $user
                : null
            );

        return $this->render(
            'task/list_done.html.twig',
            ['tasks' => $tasks]
        );
    }
}
