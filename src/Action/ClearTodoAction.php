<?php

declare(strict_types=1);

namespace Todo\Action;

use Psr\Http\Message\ResponseInterface;
use Todo\BaseAction;
use Todo\Traits\InjectTodoRepo;

class ClearTodoAction extends BaseAction
{
    const ROUTE = [self::METHOD_DELETE, '/'];
    use InjectTodoRepo;

    protected function main(): ResponseInterface
    {
        $this->todoRepo->truncate();
        return $this->json()->render([]);
    }
}