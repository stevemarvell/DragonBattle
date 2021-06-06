<?php

use DragonBattle\Dragon;
use DragonBattle\DragonFactory;
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

        DragonFactory::setLuckChecker($luckChecker);

        $combatant = DragonFactory::create();
        
        $this->assertTrue($combatant->isLucky());
    }

    public function testUnluckyMethod(): void
    {
        $luckChecker = Mockery::mock(LuckCheckerInterface::class);
        $luckChecker->shouldReceive('isLucky')->andReturn(false);

        DragonFactory::setLuckChecker($luckChecker);

        $combatant = DragonFactory::create();
        
        $this->assertFalse($combatant->isLucky());
    }

    /*
     * @depends testLuckyMethod
     * @depends testUnluckyMethod
     */
    public function testGeneratedLuck(): void
    {
        $luckChecker = new LuckChecker(function ($min,$max) { return 50; });

        DragonFactory::setLuckChecker($luckChecker);

        $combatant = DragonFactory::create(['luck' => 49]);
        $this->assertFalse($combatant->isLucky());

        $combatant = DragonFactory::create(['luck' => 50]);
        $this->assertTrue($combatant->isLucky());

        $combatant = DragonFactory::create(['luck' => 51]);
        $this->assertTrue($combatant->isLucky());
    }
}