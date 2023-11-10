<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Task>
 *
 * @method Task|null   find($id, $lockMode = null, $lockVersion = null)
 * @method Task|null   findOneBy(array $criteria, array $orderBy = null)
 * @method array<Task> findAll()
 *
 * @codingStandardsIgnoreStart
 *
 * @phpcs:ignore
 *
 * @method array<Task> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @codingStandardsIgnoreEnd
 */
final class TaskRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Task::class);
        $this->entityManager = $this->getEntityManager();
    }

    /**
     * Saves a task to the database.
     *
     * @param Task $Task the task to be saved
     */
    public function save(Task $Task): void
    {
        $this->entityManager->persist($Task);
        $this->entityManager->flush();
    }

    /**
     * Removes a task from the database.
     *
     * @param Task $Task the task to remove
     */
    public function remove(Task $Task): void
    {
        $this->entityManager->remove($Task);
        $this->entityManager->flush();
    }
}
