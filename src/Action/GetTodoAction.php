<?php

declare(strict_types=1);

namespace Todo\Action;

use Psr\Http\Message\ResponseInterface;
use Todo\BaseAction;
use Todo\Traits\GetTodoFromRequest;
use Zend\Diactoros\Response\JsonResponse;

class GetTodoAction extends BaseAction
{
    const ROUTE = [self::METHOD_GET, '/{id:\d+}'];
    use GetTodoFromRequest;

    protected function main(): ResponseInterface
    {
        $todoEntity = $this->getTodoEntity();
        if (!$todoEntity) {
            return new JsonResponse(null, 404);
        }

        return $this->json()->render($this->exportTodo($todoEntity));
    }
}