<?php

namespace DragonBattle;

use Exception;

class Battle
{
    private $combatant1;
    private $combatant2;

    /**
     * @throws Exception
     */
    public function __construct($combatant1, $combatant2)
    {
        if ($combatant1 === $combatant2) {
            throw new Exception("Combatants must be different");
        }

        $this->combatant1 = $combatant1;
        $this->combatant2 = $combatant2;
    }

    public function isOver(): bool
    {
        return !$this->combatant1->isAlive() || !$this->combatant2->isAlive();
    }

    public function winner(): ?CombatantInterface
    {
        if (!$this->isOver()) {
            return null;
        }

        return $this->combatant1->isAlive() ? $this->combatant1 : $this->combatant2;
    }
}