<?php


namespace DragonBattle;


trait LuckTrait
{
    /** @var int */
    private $luck;

    public function luck(): int
    {
        return $this->luck;
    }

    private function setLuck(int $luck): void
    {
        $this->luck = $luck < 0 ? 0 : $luck > 100 ? 100 : $luck;
    }

    public function isLucky(LuckCheckerInterface $luckChecker): bool
    {
        return $luckChecker->isLucky($this->luck);
    }
}