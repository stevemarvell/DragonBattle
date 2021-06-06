<?php


namespace DragonBattle;


class Dragon implements CombatantInterface
{
    public const NONAME = 'Dragon Who Shall Not Be Named';

    use HealthTrait;
    use LuckTrait;
    use CombatTrait;

    /** @var string */
    private $name;

    public function __construct(
        LuckCheckerInterface $luckChecker,
        string $name,
        int $health,
        int $luck,
        int $attack,
        int $defence
    )
    {
        $this->setLuckChecker($luckChecker);

        $this->setName($name);
        $this->setHealth($health);
        $this->setLuck($luck);
        $this->setAttack($attack);
        $this->setDefence($defence);
    }

    public function name():string
    {
        return $this->name;
    }

    private function setName(string $name = self::NONAME): void
    {
        $this->name = strlen($name) > 0 ? $name : self::NONAME;
    }
}