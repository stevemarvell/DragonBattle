<?php


namespace DragonBattle;


class Dragon implements CombatantInterface
{
    use HealthTrait;
    use LuckTrait;

    /** @var string */
    private $name;

    public function __construct(string $name, int $health, int $luck)
    {
        $this->name = $name;

        $this->setHealth($health);
        $this->setLuck($luck);
    }

    public function name():string
    {
        return $this->name;
    }
}