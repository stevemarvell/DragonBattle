<?php


namespace DragonBattle;


trait LuckTrait
{
    /** @var int */
    private $luck;

    /** @var LuckCheckerInterface */
    private $luckChecker;

    public function luck(): int
    {
        return $this->luck;
    }

    private function setLuck(int $luck = 0): void
    {
        $this->luck = $luck < 0 ? 0 : ( $luck > 100 ? 100 : $luck );
    }

    private function setLuckChecker(LuckCheckerInterface $luckChecker): void
    {
        $this->luckChecker = $luckChecker;
    }

    public function isLucky(): bool
    {
        return $this->luckChecker->isLucky($this->luck);
    }
}