<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Security\TaskVoter;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;

final class TaskHandler implements TaskHandlerInterface
{
    public function __construct(
        private Security $security,
        private TaskRepository $taskRepository
    ) {
    }

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

    public function toggleTask(Task $task): string
    {
        $task->toggle(true !== $task->isDone());
        $this->taskRepository->save($task);

        return $this->addTaskStatusFlash($task);
    }

    public function deleteTask(Task $task): void
    {
        $this->taskRepository->remove($task);
    }

    /**
     * @return array<Task>
     */
    public function getTasksForCurrentUser(): array
    {
        $tasks = $this->taskRepository->findAll();

        return array_filter($tasks, function (Task $task) {
            return $this->security->isGranted(TaskVoter::OWNER, $task);
        });
    }

    private function addTaskStatusFlash(Task $task): string
    {
        $status = true === $task->isDone() ? 'terminée' : 'non-terminée';

        return sprintf('La tâche %s a bien été marquée comme %s.', $task->getTitle(), $status);
    }
}
