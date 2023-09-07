<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use App\Security\TaskVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
final class TaskController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/tasks', name: 'task_list')]
    #[IsGranted(
        TaskVoter::LIST,
        message: 'Access denied.',
        statusCode: 404
    )]
    public function listTasks(
        TaskRepository $taskRepository
    ): Response {
        return $this->render('task/list.html.twig', [
            'tasks' => $taskRepository->findAll(),
        ]);
    }

    #[Route('/tasks/done', name: 'task_list_done')]
    public function listTasksDone(
        TaskRepository $taskRepository
    ): Response {
        return $this->render('task/list.html.twig', [
            'tasks' => $this->getTasksByUserAndStatus($taskRepository, true),
        ]);
    }

    #[Route('/tasks/todo', name: 'task_list_todo')]
    public function listTaskTodo(
        TaskRepository $taskRepository
    ): Response {
        return $this->render('task/list.html.twig', [
            'tasks' => $this->getTasksByUserAndStatus($taskRepository, false),
        ]);
    }

    #[Route('/tasks/create', name: 'task_create')]
    #[IsGranted(
        TaskVoter::ADD,
        message: 'Access denied.',
        statusCode: 404
    )]
    public function createAction(
        Request $request
    ): RedirectResponse|Response {
        $task = new Task();

        return $this->handleTaskForm($task, $request, 'task/create.html.twig');
    }

    #[Route('/tasks/{id}/edit', name: 'task_edit')]
    #[IsGranted(
        TaskVoter::EDIT,
        subject: 'task',
        message: 'Access denied.',
        statusCode: 404
    )]
    public function editAction(
        Task $task,
        Request $request
    ): RedirectResponse|Response {
        $task = $this->entityManager
            ->getRepository(Task::class)
            ->find($task->getId());
        if (!$task instanceof Task) {
            throw new \InvalidArgumentException('La tâche doit être une instance de '.Task::class);
        }

        return $this->handleTaskForm(
            $task,
            $request,
            'task/edit.html.twig',
            'task_list'
        );
    }

    #[Route('/tasks/{id}/toggle', name: 'task_toggle')]
    #[IsGranted(
        TaskVoter::EDIT,
        subject: 'task',
        message: 'Access denied.',
        statusCode: 404
    )]
    public function toggleTaskAction(
        Task $task
    ): RedirectResponse {
        $this->toggleTask($task);

        return $this->redirectToRoute('task_list');
    }

    #[Route('/tasks/{id}/delete', name: 'task_delete')]
    #[IsGranted(
        TaskVoter::DELETE,
        subject: 'task',
        message: 'Access denied.',
        statusCode: 404
    )]
    public function deleteTaskAction(Task $task): RedirectResponse
    {
        $this->deleteTask($task);

        return $this->redirectToRoute('task_list');
    }

    /**
     * @return array<Task>
     */
    private function getTasksByUserAndStatus(
        TaskRepository $taskRepository,
        bool $status = null
    ): array {
        return $taskRepository->findBy([
            'user' => $this->getUser(),
            'isDone' => $status,
        ], ['createdAt' => 'DESC']);
    }

    private function handleTaskForm(
        Task $task,
        Request $request,
        string $template,
        string $redirectRoute = 'task_list'
    ): RedirectResponse|Response {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$task->getId()) {
                $task->setUser($this->getUser());
            }
            $this->entityManager->persist($task);
            $this->entityManager->flush();
            $this->addFlash('success', 'La tâche a été bien traitée.');

            return $this->redirectToRoute($redirectRoute);
        }

        return $this->render(
            $template,
            [
                'form' => $form,
                'task' => $task ?? null,
            ]
        );
    }

    private function toggleTask(
        Task $task
    ): void {
        $task->toggle(!$task->isDone());
        $this->entityManager->flush();
        $this->addFlash(
            $task->isDone() ? 'success' : 'error',
            sprintf(
                'La tâche %s a bien été %s.',
                $task->getTitle(),
                $task->isDone()
                ? 'marquée comme faite' : 'marquée comme non terminée'
            )
        );
    }

    private function deleteTask(
        Task $task
    ): void {
        $this->entityManager->remove($task);
        $this->entityManager->flush();
        $this->addFlash('success', 'La tâche a été bien supprimée.');
    }
}
