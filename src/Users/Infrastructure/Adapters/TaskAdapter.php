<?php

declare(strict_types=1);

namespace App\Users\Infrastructure\Adapters;

use App\Tasks\Infrastructure\API\API;

class TaskAdapter
{
    public function __construct(private readonly API $taskApi)
    {
    }

    public function getTasksList(): array
    {
        $this->taskApi->getTasksList();
        //mapping

        return [];
    }
}
