<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Task;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Interface TaskHandlerInterface.
 *
 * This interface is used to manage a task entity.
 * The methods are used to save, delete and manage a task entity.
 */
interface TaskHandlerInterface
{
    /**
     * Save a task entity.
     *
     * @param Task               $task the task entity to save
     * @param UserInterface|null $user the user to associate with the task
     */
    public function saveTask(Task $task, ?UserInterface $user = null): void;

    /**
     * Toggle the status of a task.
     *
     * @param Task $task the task entity to toggle
     *
     * @return string the flash message
     */
    public function toggleTask(Task $task): string;

    /**
     * Delete a task entity.
     *
     * @param Task $task the task entity to delete
     */
    public function deleteTask(Task $task): void;

    /**
     * Get tasks for the current user.
     *
     * @return array<Task> the tasks owned by the current user
     */
    public function getTasksForCurrentUser(): array;
}
