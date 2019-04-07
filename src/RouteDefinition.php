<?php

namespace Todo;

use FastRoute\RouteCollector;
use Lit\Router\FastRoute\FastRouteDefinition;
use Todo\Action\ClearTodoAction;
use Todo\Action\DeleteTodoAction;
use Todo\Action\GetTodoAction;
use Todo\Action\ListTodoAction;
use Todo\Action\PatchTodoAction;
use Todo\Action\PostTodoAction;

class RouteDefinition extends FastRouteDefinition
{
    public function __invoke(RouteCollector $routeCollector): void
    {
        $routeCollector->get('/', ListTodoAction::class);
        $routeCollector->post('/', PostTodoAction::class);
        $routeCollector->delete('/', ClearTodoAction::class);

        $routeCollector->get('/{id:\d+}', GetTodoAction::class);
        $routeCollector->patch('/{id:\d+}', PatchTodoAction::class);
        $routeCollector->delete('/{id:\d+}', DeleteTodoAction::class);
    }
}
