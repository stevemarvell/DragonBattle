<?php


namespace DragonBattle;


class Dragon implements CombatantInterface
{
    use HealthTrait;
    use LuckTrait;

    /** @var string */
    private $name;

    public function __construct(
        LuckCheckerInterface $luckChecker,
        string $name,
        int $health,
        int $luck)
    {
        $this->name = $name;

        $this->setHealth($health);

        $this->setLuck($luck);
        $this->setLuckChecker($luckChecker);
    }

    public function name():string
    {
        return $this->name;
    }
}