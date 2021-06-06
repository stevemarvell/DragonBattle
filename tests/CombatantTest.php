<?php


use DragonBattle\Dragon;
use DragonBattle\DragonFactory;
use DragonBattle\LuckChecker;
use DragonBattle\LuckCheckerInterface;
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
        $luckChecker = Mockery::mock(LuckCheckerInterface::class);
        $combatant = new Dragon($luckChecker,'Bob', 10, 11);

        $this->assertEquals('Bob', $combatant->name());
        $this->assertEquals(10, $combatant->health());
        $this->assertEquals(11, $combatant->luck());
    }

    public function testFactory(): void
    {
        $combatant = DragonFactory::create(
            [
                'name' => 'Bob',
                'health' => 10,
                'luck' => 11,
            ]
        );

        $this->assertEquals("Bob", $combatant->name());
        $this->assertEquals(10, $combatant->health());
        $this->assertEquals(11, $combatant->luck());
    }
}
