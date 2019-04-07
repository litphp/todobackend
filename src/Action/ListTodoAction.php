<?php

declare(strict_types=1);

namespace Todo\Action;

use Psr\Http\Message\ResponseInterface;
use Todo\BaseAction;
use Todo\Entity\TodoEntity;
use Todo\Traits\InjectTodoRepo;

class ListTodoAction extends BaseAction
{
    use InjectTodoRepo;

    protected function main(): ResponseInterface
    {
        return $this->json()->render(array_map(function (TodoEntity $entity) {
            return $this->exportTodo($entity);
        }, $this->todoRepo->list()));
    }
}
