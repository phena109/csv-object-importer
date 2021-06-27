<?php


namespace app\lib;


class Currency
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function isDebit(): bool
    {
        return $this->value < 0;
    }

    public function isCredit(): bool
    {
        return $this->value > 0;
    }

    public function getValue(): float
    {
        return $this->value / 100;
    }

    public function setValue(float $value): void
    {
        $this->value = intval($value * 100);
    }
}