<?php


namespace DragonBattle;


interface CombatInterface
{
    public function attack(): int;
    public function defence(): int;
}