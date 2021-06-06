<?php


namespace DragonBattle;


trait HealthTrait
{
    /** @var int */
    private $health;

    public function health(): int
    {
        return $this->health;
    }

    private function setHealth(int $health): void
    {
        $this->health = $health < 0 ? 0 : $health;
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    public function takeDamage(int $damage): void
    {
        $this->setHealth($this->health - $damage);
    }

}