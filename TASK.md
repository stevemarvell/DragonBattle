#Task

Create a command line PHP application that simulates a battle between two dragons.

## Rules

The script should optionally ask for the names of the dragons.

The script should optionally ask for the total bouts to be fought. Default to 1 The script should randomly 
create 2 dragons, and simulate a turn based fight between them. The script should be verbose, describing 
everything that happens during the battle. The script should end when one of the dragons is defeated. 

You are free to implement this in any way you choose, however please inform us of any assumptions or 
decisions you have made, and why, and remember this is an enterprise engineering task with all the 
expectations of that level. Show us what you’re good at.

## Interpretation and Implementation

This is an "anything" combat system, not a dragon combat system. Dragon in context, is a combatant. 
A combatant is therefore an interface.

Health is largely self-contained, and so can be made a trait with an interface. Setting health less than zero 
is a mistake, not an exception, so set to zero. This alleviates any need for `takeDamage` with the actual effect. 
Rather is just obeys the rules. Setting largely seem an internal process and the `setHealth()` method should be
`private`.

There is no point in having `Dragon extends Creature` and `Creature extends Object` so that objects can have names, 
because that's a future assumption. We can always promote names that later. Nor is there merit in letting something 
be `Nameable`.



Command line arguments:

`php dragon-battle.php [--name1=NAME] [--name2=NAME] [--matches=NUMBER]`

Defaults:

    name1="Dragon 1"
    name2="Dragon 2"
    matches=1

Turns are sequential, with one attack following another, not simultaneous attacks. Therefore, in each turn,
there will be one attacker and one defender amd so damage in one direction. This way, there can be no draws.

    damage = attack - defence

    luck can dodge and double defence
    luck can pierce and double attack

Combat has no options, so does not deserve a Strategy pattern.


## Data

### Red Dragon

    Health: 80-100
    Attack Power: 5-15
    Defence Power: 5-15
    Luck: 15-30

Special Ability: +5% attack against a Blue Dragon

### Green Dragon

    Health: 60-80
    Attack Power: 10-20
    Defence Power: 10-20
    Luck: 0-10

Special Ability: +5% luck against a Red Dragon

### Blue Dragon

    Health: 70-90
    Attack Power: 10-15
    Defence Power: 10-15
    Luck: 10-20

Special Ability: +5% defence against a Green Dragon
