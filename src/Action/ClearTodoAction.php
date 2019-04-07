<?php

declare(strict_types=1);

namespace Todo\Action;

use Psr\Http\Message\ResponseInterface;
use Todo\BaseAction;
use Todo\Traits\InjectTodoRepo;

class ClearTodoAction extends BaseAction
{
    use InjectTodoRepo;

    protected function main(): ResponseInterface
    {
        $this->todoRepo->truncate();
        return $this->json()->render([]);
    }
}