<?php

namespace Todo;

use FastRoute\RouteCollector;
use Lit\Router\FastRoute\FastRouteDefinition;
use Symfony\Component\Finder\Finder;

class RouteDefinition extends FastRouteDefinition
{
    public function __invoke(RouteCollector $routeCollector): void
    {
        $finder = Finder::create()
            ->files()
            ->in(__DIR__ . '/Action')
            ->name('*Action.php');

        foreach ($finder->getIterator() as $file) {
            $cls = implode('\\', [
                __NAMESPACE__,
                'Action',
                substr($file->getBasename(), 0, -4) // .php
            ]);
            if (defined("$cls::ROUTE")) {
                $routeCollector->addRoute($cls::ROUTE[0], $cls::ROUTE[1], $cls);
            }
        }
    }
}
