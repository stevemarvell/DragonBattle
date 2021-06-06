<?php


namespace DragonBattle;


interface LuckCheckerInterface
{
    public function isLucky(int $luckiness): bool;
}