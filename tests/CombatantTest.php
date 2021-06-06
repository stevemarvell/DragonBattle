<?php


use DragonBattle\Dragon;
use PHPUnit\Framework\TestCase;

class CombatantTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testConstruction(): void
    {
        $combatant = new Dragon("Bob", 10);

        $this->assertEquals("Bob", $combatant->name());
        $this->assertEquals(10, $combatant->health());
    }

    public function testAliveIfHealthy(): void
    {
        $combatant = new Dragon("Bob", 10);
        $this->assertTrue($combatant->isAlive());

        $combatant = new Dragon("Bob", 10);
        $this->assertTrue($combatant->isAlive());
    }

    public function testDieIfDamagedBeyondHealth(): void
    {
        $combatant = new Dragon("Bob", 10);

        $combatant->takeDamage(9 );
        $this->assertEquals(1, $combatant->health());
        $this->assertTrue($combatant->isAlive());

        $combatant->takeDamage(1);
        $this->assertEquals(0, $combatant->health());
        $this->assertFalse($combatant->isAlive());

        $combatant->takeDamage(1);
        $this->assertEquals(0, $combatant->health());
        $this->assertFalse($combatant->isAlive());

        $combatant = new Dragon("Bob", 10);
        $combatant->takeDamage(11);
        $this->assertEquals(0, $combatant->health());
        $this->assertFalse($combatant->isAlive());

        $combatant = new Dragon("Bob", 10);
        $combatant->takeDamage(11);
        $this->assertEquals(0, $combatant->health());
        $this->assertFalse($combatant->isAlive());
    }
}
