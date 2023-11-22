<?php

declare(strict_types=1);

namespace App\Tasks\Domain\Entity;

use App\Shared\Infrastructure\Database\DBAL\AbstractEnumType;

class TaskStatusType extends AbstractEnumType
{
    protected string $name = 'task_status';
    protected array $values = [];
    protected static array $options = array(
        'todo',
        'done'
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
