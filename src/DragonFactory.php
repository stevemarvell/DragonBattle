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
            static::setLuckChecker(new LuckChecker('mt_rand'));
        }

        return new Dragon(
            static::$luckChecker,
            $attributes['name'] ?? Dragon::NONAME,
            $attributes['health'] ?? 0,
            $attributes['luck'] ?? 0,
            $attributes['attack'] ?? 0,
            $attributes['defence'] ?? 0,
        );
    }
}