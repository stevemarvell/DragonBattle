<?php


namespace DragonBattle;


class LuckChecker implements LuckCheckerInterface
{
    /**
     * @var callable
     */
    private $generator;

    public function __construct(callable $generator)
    {
        $this->generator = $generator;
    }

    private function percentage(): int
    {
        return call_user_func($this->generator,0,100);
    }

    public function isLucky(int $luckiness): bool
    {
        return $this->percentage() <= $luckiness;
    }
}