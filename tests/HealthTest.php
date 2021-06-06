<?php

use DragonBattle\Dragon;
use DragonBattle\DragonFactory;
use PHPUnit\Framework\TestCase;

class HealthTest extends TestCase
{
    public function testAliveIfHealthy(): void
    {
        $combatant = DragonFactory::create(['health' => 10]);

        $this->assertTrue($combatant->isAlive());

        $combatant->takeDamage(9);
        $this->assertEquals(1, $combatant->health());
        $this->assertTrue($combatant->isAlive());
    }

    public function testDieIfDamagedBeyondHealth(): void
    {
        $combatant = DragonFactory::create(['health' => 10]);

        $combatant->takeDamage(10);
        $this->assertEquals(0, $combatant->health());
        $this->assertFalse($combatant->isAlive());
    }

    public function testZeroHealthIfLotsOfDamage(): void
    {
        $combatant = DragonFactory::create(['health' => 10]);

        $combatant->takeDamage(9);
        $combatant->takeDamage(2);
        $this->assertEquals(0, $combatant->health());
        $this->assertFalse($combatant->isAlive());

        $combatant = DragonFactory::create(['health' => 10]);

        $combatant->takeDamage(10);
        $combatant->takeDamage(1);
        $this->assertEquals(0, $combatant->health());
        $this->assertFalse($combatant->isAlive());

        $combatant = DragonFactory::create(['health' => 10]);

        $combatant->takeDamage(11);
        $this->assertEquals(0, $combatant->health());
        $this->assertFalse($combatant->isAlive());
    }
}