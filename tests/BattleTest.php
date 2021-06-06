<?php


use DragonBattle\Dragon;
use PHPUnit\Framework\TestCase;
use DragonBattle\Battle;

class BattleTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testWinnerCombatant1()
    {
        $combatant1 = Mockery::mock(Dragon::class);
        $combatant1->shouldReceive('isAlive')->andReturn(true);

        $combatant2 = Mockery::mock(Dragon::class);
        $combatant2->shouldReceive('isAlive')->andReturn(false);

        $battle = new Battle($combatant1, $combatant2);

        $this->assertTrue($battle->isOver());
        $this->assertEquals($combatant1, $battle->winner());
    }

    public function testWinnerCombatant2()
    {
        $combatant1 = Mockery::mock(Dragon::class);
        $combatant1->shouldReceive('isAlive')->andReturn(false);

        $combatant2 = Mockery::mock(Dragon::class);
        $combatant2->shouldReceive('isAlive')->andReturn(true);

        $battle = new Battle($combatant1, $combatant2);

        $this->assertTrue($battle->isOver());
        $this->assertEquals($combatant2, $battle->winner());
    }

    public function testIsOngoing()
    {
        $combatant1 = Mockery::mock(Dragon::class);
        $combatant1->shouldReceive('isAlive')->andReturn(true);

        $combatant2 = Mockery::mock(Dragon::class);
        $combatant2->shouldReceive('isAlive')->andReturn(true);

        $battle = new Battle($combatant1, $combatant2);

        $this->assertFalse($battle->isOver());
        $this->assertNull($battle->winner());
    }

    public function testDifferenceCombatants()
    {
        $this->expectException(Exception::class);

        $combatant1 = Mockery::mock(Dragon::class);

        new Battle($combatant1, $combatant1);
    }
}
