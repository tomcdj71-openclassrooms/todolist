<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Security\TaskVoter;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class TaskHandler.
 *
 * This class handles the saving and toggling of tasks.
 */
final class TaskHandler implements TaskHandlerInterface
{
    public function __construct(
        private Security $security,
        private TaskRepository $taskRepository
    ) {
    }

    /**
     * Saves a task to the database.
     *
     * @param Task the task to save
     * @param UserInterface|null The user associated with the task, if any.
     * If null, the current user will be used.
     */
    public function saveTask(Task $task, ?UserInterface $user = null): void
    {
        // if the task has no user, we set the current user
        if ($user instanceof UserInterface) {
            $task->setUser($user);
        }

        // if the task already has a user ensure the user does not change
        $task->setUser($task->getUser());

        $this->taskRepository->save($task);
    }

    /**
     * Toggle the status of a task.
     *
     * @param Task $task the task entity to toggle
     *
     * @return string the flash message
     */
    public function toggleTask(Task $task): string
    {
        $task->toggle(true !== $task->isDone());
        $this->taskRepository->save($task);

        return $this->addTaskStatusFlash($task);
    }

    /**
     * Delete a task entity.
     *
     * @param Task $task the task entity to delete
     */
    public function deleteTask(Task $task): void
    {
        $this->taskRepository->remove($task);
    }

    /**
     * Get tasks for the current user.
     *
     * @return array<Task> the tasks owned by the current user
     */
    public function getTasksForCurrentUser(): array
    {
        $tasks = $this->taskRepository->findAll();

        return array_filter($tasks, function (Task $task) {
            return $this->security->isGranted(TaskVoter::OWNER, $task);
        });
    }

    /**
     * Adds a flash message indicating the status of a task.
     *
     * @param Task $task the task to add the flash message for
     *
     * @return string the flash message
     */
    private function addTaskStatusFlash(Task $task): string
    {
        $status = true === $task->isDone() ? 'terminée' : 'non-terminée';

        return sprintf(
            'La tâche %s a bien été marquée comme %s.',
            $task->getTitle(),
            $status
        );
    }
}
