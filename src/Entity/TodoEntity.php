<?php

declare(strict_types=1);

namespace Todo\Entity;

use Todo\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="doctrine_todo")
 */
class TodoEntity extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    public $title;
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    public $priority = 100;
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    public $completed = 0;
}
