<?php

declare(strict_types=1);

namespace Todo\Action;

use Todo\BaseAction;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

class HomeAction extends BaseAction
{
    const SOURCE = <<<'HTML'
<html lang="en"><body>
<h1>Hello LitPHP!</h1>
</body></html>
HTML;

    protected function main(): ResponseInterface
    {
        return new HtmlResponse(self::SOURCE);
    }
}
