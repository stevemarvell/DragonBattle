<?php


use DragonBattle\Dragon;
use DragonBattle\DragonFactory;
use DragonBattle\LuckCheckerInterface;
use PHPUnit\Framework\TestCase;

class DragonTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testConstruction(): void
    {
        $luckChecker = Mockery::mock(LuckCheckerInterface::class);

        $dragon = new Dragon($luckChecker,'Bob', 10, 11, 12, 13);

        $this->assertEquals('Bob', $dragon->name());
        $this->assertEquals(10, $dragon->health());
        $this->assertEquals(11, $dragon->luck());
        $this->assertEquals(12, $dragon->attack());
        $this->assertEquals(13, $dragon->defence());

        $dragon = new Dragon($luckChecker,'Bob', -1, -1, -1, -1);

        $this->assertEquals('Bob', $dragon->name());
        $this->assertEquals(0, $dragon->health());
        $this->assertEquals(0, $dragon->luck());
        $this->assertEquals(0, $dragon->attack());
        $this->assertEquals(0, $dragon->defence());

        $dragon = new Dragon($luckChecker,'', 101, 101, 101, 101);

        $this->assertEquals('Dragon Who Shall Not Be Named', $dragon->name());
        $this->assertEquals(101, $dragon->health());
        $this->assertEquals(100, $dragon->luck());
        $this->assertEquals(101, $dragon->attack());
        $this->assertEquals(101, $dragon->defence());
    }

    public function testFactory(): void
    {
        $dragon = DragonFactory::create(
            [
                'name' => 'Bob',
                'health' => 10,
                'luck' => 11,
                'attack' => 12,
                'defence' => 13,
            ]
        );

        $this->assertEquals('Bob', $dragon->name());
        $this->assertEquals(10, $dragon->health());
        $this->assertEquals(11, $dragon->luck());
        $this->assertEquals(12, $dragon->attack());
        $this->assertEquals(13, $dragon->defence());

        $dragon = DragonFactory::create();

        $this->assertEquals('Dragon Who Shall Not Be Named', $dragon->name());
        $this->assertEquals(0, $dragon->health());
        $this->assertEquals(0, $dragon->luck());
        $this->assertEquals(0, $dragon->attack());
        $this->assertEquals(0, $dragon->defence());
    }
}
