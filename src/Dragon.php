<?php


namespace DragonBattle;


class Dragon implements CombatantInterface
{
    use HealthTrait;

    /** @var string */
    private $name;

    public function __construct(string $name, int $health)
    {
        $this->name = $name;

        $this->setHealth($health);
    }

    public function name():string
    {
        return $this->name;
    }
}