<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class TaskService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private TaskRepository $taskRepository
    ) {
    }

    /**
     * @return array<Task>
     */
    public function getTasks(?UserInterface $user = null): array
    {
        return $user instanceof UserInterface
            ? $this->taskRepository->findByUser($user)
            : $this->taskRepository->findAll();
    }

    public function saveTask(Task $task, ?UserInterface $user = null): void
    {
        if ($user instanceof UserInterface) {
            $task->setUser($user);
        }

        $this->persistAndFlush($task);
    }

    public function toggleTask(Task $task): void
    {
        $task->toggle($task->isDone() !== true);
        $this->flush();
    }

    public function deleteTask(Task $task): void
    {
        $this->entityManager->remove($task);
        $this->flush();
    }

    /**
     * @return array<Task>
     */
    public function getDoneTasks(?UserInterface $user = null): array
    {
        return $user instanceof UserInterface
            ? $this->taskRepository->findByUserAndStatus($user)
            : $this->taskRepository->findByStatus(true);
    }

    private function persistAndFlush(Task $task): void
    {
        $this->entityManager->persist($task);
        $this->flush();
    }

    private function flush(): void
    {
        $this->entityManager->flush();
    }
}
