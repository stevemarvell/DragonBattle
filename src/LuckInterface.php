<?php


namespace DragonBattle;


interface LuckInterface
{
    public function luck(): int;

    public function isLucky(): bool;
}