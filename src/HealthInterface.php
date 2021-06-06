<?php


namespace DragonBattle;


interface HealthInterface
{
    public function health(): int;

    public function isAlive(): bool;

    public function takeDamage(int $damage): void;
}