<?php


namespace DragonBattle;


trait CombatTrait
{
    /** @var int */
    private $attack;

    /** @var int */
    private $defence;

    public function attack(): int
    {
        return $this->attack;
    }

    public function defence(): int
    {
        return $this->defence;
    }

    private function setAttack(int $attack = 0): void
    {
        $this->attack = $attack < 0 ? 0 : $attack;
    }

    private function setDefence(int $defence = 0): void
    {
        $this->defence = $defence < 0 ? 0 : $defence;
    }
}