<?php

declare(strict_types=1);

namespace Todo\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Todo\Entity\TodoEntity;

class TodoRepo
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * TodoRepo constructor.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(TodoEntity $todo)
    {
        $this->entityManager->persist($todo);
        $this->entityManager->flush();
    }


    public function remove(TodoEntity $todo)
    {
        $this->entityManager->remove($todo);
        $this->entityManager->flush();
    }

    public function list()
    {
        return $this->repo()->findAll();
    }

    public function find(int $id): ?TodoEntity
    {
        $obj = $this->entityManager->find(TodoEntity::class, $id);
        assert($obj===null || $obj instanceof TodoEntity);

        return $obj;
    }

    public function truncate()
    {
        $this->entityManager->createQuery('DELETE FROM '.TodoEntity::class)->execute();
    }

    public function spawn(): TodoEntity
    {
        return new TodoEntity();
    }

    /**
     * @return ObjectRepository
     */
    private function repo(): ObjectRepository
    {
        return $this->entityManager->getRepository(TodoEntity::class);
    }
}
