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
 * @method array<Task> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class TaskRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
        $this->entityManager = $this->getEntityManager();
    }

    public function save(Task $Task): void
    {
        $this->entityManager->persist($Task);
        $this->entityManager->flush();
    }

    public function remove(Task $Task): void
    {
        $this->entityManager->remove($Task);
        $this->entityManager->flush();
    }
}
