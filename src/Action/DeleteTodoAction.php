<?php

declare(strict_types=1);

namespace Todo\Action;

use Psr\Http\Message\ResponseInterface;
use Todo\BaseAction;
use Todo\Traits\GetTodoFromRequest;
use Zend\Diactoros\Response\EmptyResponse;
use Zend\Diactoros\Response\JsonResponse;

class DeleteTodoAction extends BaseAction
{
    use GetTodoFromRequest;

    protected function main(): ResponseInterface
    {
        $todoEntity = $this->getTodoEntity();
        if (!$todoEntity) {
            return new JsonResponse(null, 404);
        }
        $this->todoRepo->remove($todoEntity);

        return new EmptyResponse();
    }
}