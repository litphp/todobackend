<?php

declare(strict_types=1);

namespace Todo\Action;

use Todo\BaseAction;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

class NotFoundAction extends BaseAction
{
    const SOURCE = <<<'HTML'
<html lang="en">
<body>
<h1>404 Not  Found</h1>
<hr>
<h3>How to create a new page</h3>
<ol>
<li>create an action class <code>Todo\Action\YourAction</code></li>
<li>register it to router in <code>Todo\RouteDefinition</code></li>
</ol>
</body>
</html>
HTML;

    protected function main(): ResponseInterface
    {
        return new HtmlResponse(self::SOURCE, 404);
    }
}
