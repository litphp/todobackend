<?php

declare(strict_types=1);

namespace Todo;

use Lit\Air\Configurator as C;
use Lit\Bolt\BoltApp;
use Lit\Router\FastRoute\FastRouteConfiguration;
use Middlewares\JsonPayload;
use Psr\Http\Server\MiddlewareInterface;

class TodoAppConfiguration
{
    public static function default()
    {
        $configuration = [
            C::join(BoltApp::class, 'middleware') => function (JsonPayload $jsonPayload) {
                return $jsonPayload;
            },
            C::join(BaseAction::class, '') => [
                'urlBase' => '/api',
            ],
        ];
        $configuration += FastRouteConfiguration::default(C::produce(RouteDefinition::class));

        return $configuration;
    }
}
