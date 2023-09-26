<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;

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

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Task::class);
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

    public function findByUserAndStatus(UserInterface $user): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.user = :user')
            ->andWhere('t.isDone = :isDone')
            ->setParameter('user', $user)
            ->setParameter('isDone', false)
            ->orderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByStatus(bool $isDone): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.isDone = :isDone')
            ->setParameter('isDone', $isDone)
            ->orderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByUser(UserInterface $user): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.user = :user')
            ->setParameter('user', $user)
            ->orderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
