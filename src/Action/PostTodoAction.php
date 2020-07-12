<?php

declare(strict_types=1);

namespace Todo\Action;

use Psr\Http\Message\ResponseInterface;
use Todo\BaseAction;
use Todo\Traits\InjectTodoRepo;

class PostTodoAction extends BaseAction
{
    use InjectTodoRepo;

    protected function main(): ResponseInterface
    {
        $todo = $this->todoRepo->spawn();
        $todo->title = $this->request->getParsedBody()['title'];
        $todo->priority = intval($this->request->getParsedBody()['order'] ?? 100);
        $todo->completed = 0;
        $this->todoRepo->save($todo);

        return $this->json()->render($this->exportTodo($todo));
    }
}
