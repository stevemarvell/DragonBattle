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
}
