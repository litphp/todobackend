<?php

declare(strict_types=1);

namespace Todo\Action;

use Psr\Http\Message\ResponseInterface;
use Todo\BaseAction;
use Todo\Traits\GetTodoFromRequest;
use Zend\Diactoros\Response\JsonResponse;

class PatchTodoAction extends BaseAction
{
    use GetTodoFromRequest;

    protected function main(): ResponseInterface
    {
        $todo = $this->getTodoEntity();
        if (!$todo) {
            return new JsonResponse(null, 404);
        }

        $title = $this->request->getParsedBody()['title'] ?? null;
        if (!is_null($title)) {
            $todo->title = $title;
        }

        $order = $this->request->getParsedBody()['order'] ?? null;
        if (!is_null($order)) {
            $todo->priority = intval($order);
        }

        $completed = $this->request->getParsedBody()['completed'] ?? null;
        if (!is_null($completed)) {
            $todo->completed = $completed;
        }

        $this->todoRepo->save($todo);

        return $this->json()->render($this->exportTodo($todo));
    }
}