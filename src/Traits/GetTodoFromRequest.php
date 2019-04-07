<?php

declare(strict_types=1);

namespace Todo\Traits;

use Lit\Core\ThrowableResponse;
use Psr\Http\Message\ServerRequestInterface;
use Todo\Entity\TodoEntity;
use Zend\Diactoros\Response\TextResponse;

/**
 * @property-read ServerRequestInterface request
 */
trait GetTodoFromRequest
{
    use InjectTodoRepo;

    protected function getTodoEntity(): ?TodoEntity
    {
        $id = intval($this->request->getAttribute('id'));
        if (!$id) {
            throw new ThrowableResponse(new TextResponse('cannot find todo', 400));
        }

        return $this->todoRepo->find($id);
    }
}