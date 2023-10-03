<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Handler\TaskHandler;
use App\Security\TaskVoter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        private readonly TaskHandler $taskHandler,
    ) {
    }

    #[Route(
        '',
        name: 'list'
    )]
    public function listAction(): Response
    {
        $tasks = $this->taskHandler->getTasksForCurrentUser();

        return $this->render(
            'task/list.html.twig',
            ['tasks' => $tasks]
        );
    }

    #[Route(
        '/create',
        name: 'create',
    )]
    public function createAction(Request $request): Response
    {
        $task = new Task();
        $form = $this->createForm(
            TaskType::class,
            $task
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->taskHandler->saveTask($task, $this->getUser());
            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list');
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
    public function editAction(Task $task, Request $request): Response
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->taskHandler->saveTask($task);
            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('task_list');
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
    public function toggleTaskAction(Task $task): Response
    {
        $flashMessage = $this->taskHandler->toggleTask($task);
        $this->addFlash('success', $flashMessage);

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
    public function deleteTaskAction(Task $task): Response
    {
        $this->taskHandler->deleteTask($task);
        $this->addFlash('success', 'La tâche a bien été supprimée.');

        return $this->redirectToRoute(
            'task_list'
        );
    }
}
