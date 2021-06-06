<?php

use DragonBattle\Dragon;
use DragonBattle\LuckChecker;
use DragonBattle\LuckCheckerInterface;
use PHPUnit\Framework\TestCase;

class LuckTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testLuckyMethod(): void
    {
        $luckChecker = Mockery::mock(LuckCheckerInterface::class);
        $luckChecker->shouldReceive('isLucky')->andReturn(true);
        $combatant = new Dragon("Bob", 10, 10);
        $this->assertTrue($combatant->isLucky($luckChecker));
    }

    public function testUnluckyMethod(): void
    {
        $luckChecker = Mockery::mock(LuckCheckerInterface::class);
        $luckChecker->shouldReceive('isLucky')->andReturn(false);
        $combatant = new Dragon("Bob", 10, 10);
        $this->assertFalse($combatant->isLucky($luckChecker));
    }

    /*
     * @depends testLuckyMethod
     * @depends testUnluckyMethod
     */
    public function testGeneratedLuck(): void
    {
        $luckChecker = new LuckChecker(function ($min,$max) { return 50; });

        $combatant = new Dragon("Bob", 10, 49);
        $this->assertFalse($combatant->isLucky($luckChecker));

        $combatant = new Dragon("Bob", 10, 50);
        $this->assertTrue($combatant->isLucky($luckChecker));

        $combatant = new Dragon("Bob", 10, 51);
        $this->assertTrue($combatant->isLucky($luckChecker));
    }
}