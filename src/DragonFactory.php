<?php


namespace DragonBattle;


class DragonFactory
{
    /** @var LuckCheckerInterface */
    private static $luckChecker;

    public static function setLuckChecker(LuckCheckerInterface $luckChecker)
    {
        static::$luckChecker = $luckChecker;
    }

    public static function create($attributes = []): Dragon
    {
        if (!isset(static::$luckChecker)) {
            static::$luckChecker = new LuckChecker('mt_rand');
        }

        return new Dragon(
            static::$luckChecker,
            $attributes['name'] ?? "Unnamed",
            $attributes['health'] ?? 0,
            $attributes['luck'] ?? 0,
        );
    }
}