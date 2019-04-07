<?php

declare(strict_types=1);

namespace Todo\Entity;

use Todo\BaseEntity;

class TodoEntity extends BaseEntity
{
    public $id;
    /**
     * @var string
     */
    public $title;
    /**
     * @var int
     */
    public $priority = 100;
    /**
     * @var int
     */
    public $completed = 0;
}
