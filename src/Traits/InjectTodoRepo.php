<?php

declare(strict_types=1);

namespace Todo\Traits;

use Todo\Repository\TodoRepo;

trait InjectTodoRepo
{
    /**
     * @var TodoRepo
     */
    private $todoRepo;

    /**
     * @param TodoRepo $todoRepo
     */
    public function injectTodoRepo(TodoRepo $todoRepo): void
    {
        $this->todoRepo = $todoRepo;
    }
}