<?php

declare(strict_types=1);

namespace Todo;

use Lit\Bolt\BoltAbstractAction;
use Todo\Entity\TodoEntity;

abstract class BaseAction extends BoltAbstractAction
{
    /**
     * @var string
     */
    private $urlBase;

    /**
     * @param string $urlBase
     */
    public function injectUrlBase(string $urlBase): void
    {
        $this->urlBase = $urlBase;
    }


    /**
     * @param TodoEntity $todo
     * @return array
     */
    public function exportTodo($todo): array
    {
        return [
            'url' => $this->urlBase . '/' . $todo->id,
            'title' => $todo->title,
            'order' => intval($todo->priority),
            'completed' => !!$todo->completed,
        ];
    }
}
