<?php

declare(strict_types=1);

namespace App\Tasks\Domain\Entity;

use App\Shared\Infrastructure\Database\DBAL\AbstractEnumType;

class TaskPriorityType extends AbstractEnumType
{
    protected string $name = 'task_priority';
    protected array $values = [];
    protected static array $options = array(
        '1',
        '2',
        '3',
        '4',
        '5'
    );

    function __init()
    {
        $this->values = self::$options;
    }

    public function getValidValues(): array
    {
        return self::$options;
    }
}
