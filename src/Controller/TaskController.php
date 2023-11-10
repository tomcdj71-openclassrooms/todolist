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

/**
 * This class represents the controller for tasks.
 */
#[Route('/tasks', name: 'task_')]
final class TaskController extends AbstractController
{
    public function __construct(
        private readonly TaskHandler $taskHandler,
    ) {
    }

    /**
     * Lists all tasks for the current user.
     */
    #[Route('', name: 'list')]
    public function listAction(): Response
    {
        $tasks = $this->taskHandler->getTasksForCurrentUser();

        return $this->render(
            'task/list.html.twig',
            ['tasks' => $tasks]
        );
    }

    /**
     * Creates a new task.
     *
     * @param Request $request the HTTP request
     *
     * @return Response the HTTP response
     */
    #[Route('/create', name: 'create')]
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

    /**
     * Edit a task.
     *
     * @param Task    $task    the task to edit
     * @param Request $request the request object
     *
     * @return Response the response object
     */
    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    #[IsGranted(TaskVoter::OWNER, subject: 'task')]
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

    /**
     * Toggles the status of a task and redirects to the task list page.
     *
     * @param Task $task the task to toggle
     *
     * @return Response the response object
     */
    #[Route('/{id}/toggle', name: 'toggle', methods: ['POST'])]
    #[IsGranted(TaskVoter::OWNER, subject: 'task')]
    public function toggleTaskAction(Task $task): Response
    {
        $flashMessage = $this->taskHandler->toggleTask($task);
        $this->addFlash('success', $flashMessage);

        return $this->redirectToRoute('task_list');
    }

    /**
     * Deletes a task.
     *
     * @param Task $task the task to delete
     *
     * @return Response the response instance
     */
    #[Route('/{id}/delete', name: 'delete', methods: ['POST', 'DELETE'])]
    #[IsGranted(TaskVoter::OWNER, subject: 'task')]
    public function deleteTaskAction(Task $task): Response
    {
        $this->taskHandler->deleteTask($task);
        $this->addFlash('success', 'La tâche a bien été supprimée.');

        return $this->redirectToRoute(
            'task_list'
        );
    }
}
