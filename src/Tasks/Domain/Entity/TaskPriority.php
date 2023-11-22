<?php

declare(strict_types=1);

namespace App\Tasks\Domain\Entity;

use Webmozart\Assert\Assert;

class TaskPriority
{
    public const HIGEST = 1;
    public const HIGH = 2;
    public const MEDIUM = 3;
    public const LOW = 4;
    public const LOWEST = 5;

    private $name;

    public function __construct(int $name)
    {
        Assert::oneOf($name, [
            self::HIGEST,
            self::HIGH,
            self::MEDIUM,
            self::LOW,
            self::LOWEST
        ]);

        $this->name = $name;
    }

    public static function higest(): self
    {
        return new self(self::HIGEST);
    }

    public static function high(): self
    {
        return new self(self::HIGH);
    }

    public static function medium(): self
    {
        return new self(self::MEDIUM);
    }

    public static function low(): self
    {
        return new self(self::LOW);
    }

    public static function lowest(): self
    {
        return new self(self::LOWEST);
    }

    public function isHigest(): bool
    {
        return $this->name === self::HIGEST;
    }

    public function isHigh(): bool
    {
        return $this->name === self::HIGH;
    }

    public function isMedium(): bool
    {
        return $this->name === self::MEDIUM;
    }

    public function isLow(): bool
    {
        return $this->name === self::LOW;
    }

    public function isLowest(): bool
    {
        return $this->name === self::LOWEST;
    }

    public function isEqual(self $status): bool
    {
        return $this->getName() === $status->getName();
    }

    public function getName(): int
    {
        return $this->name;
    }
}
