<?php

declare(strict_types=1);

namespace Todo\Repository;

use Todo\Entity\TodoEntity;

class TodoRepo
{
    private const SQL_INSERT = <<<'SQL'
INSERT INTO todo (title, completed, priority) VALUES (?,?,?);
SQL;
    private const SQL_UPDATE = <<<'SQL'
UPDATE todo SET title = ?, completed = ?, priority = ? WHERE id = ?;
SQL;
    private const SQL_SELECT_ALL = <<<'SQL'
SELECT id, title, completed, priority
FROM todo;
SQL;
    private const SQL_FIND = <<<'SQL'
SELECT id, title, completed, priority
FROM todo
WHERE id=?;
SQL;
    private const SQL_TRUNCATE = <<<'SQL'
DELETE FROM todo;
SQL;
    private const SQL_DELETE = <<<'SQL'
DELETE FROM todo WHERE id=?;
SQL;

    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * TodoRepo constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(TodoEntity $todo)
    {
        if ($todo->id) {
            $statement = self::SQL_UPDATE;
            $values = [$todo->title, $todo->completed, $todo->priority, $todo->id];
        } else {
            $statement = self::SQL_INSERT;
            $values = [$todo->title, $todo->completed, $todo->priority];
        }

        $stmt = $this->pdo->prepare($statement);
        $ok = $stmt->execute($values);
        if (!$ok) {
            throw new \Exception('failed to execute save');
        }

        if (!$todo->id) {
            $todo->id = $this->pdo->lastInsertId();
        }
    }


    public function remove(TodoEntity $todo)
    {
        if(!$todo->id) {
            return;
        }

        $this->pdo->prepare(self::SQL_DELETE)->execute([$todo->id]);
    }

    public function list()
    {
        $statement = self::SQL_SELECT_ALL;
        $query = $this->pdo->query($statement, \PDO::FETCH_CLASS, TodoEntity::class);

        return $query->fetchAll();
    }

    public function find(int $id): ?TodoEntity
    {
        $statement = self::SQL_FIND;
        $query = $this->pdo->query($statement, \PDO::FETCH_CLASS, TodoEntity::class);
        $query->execute([$id]);

        return $query->fetch() ?: null;
    }

    public function truncate()
    {
        $this->pdo->exec(self::SQL_TRUNCATE);
    }

    public function spawn(): TodoEntity
    {
        return new TodoEntity();
    }
}
