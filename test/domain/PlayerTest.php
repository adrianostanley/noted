<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Noted\Domain\Player;

class PlayerTest extends TestCase {

    public function testSetPropertiesFromObject() {
        $playerGuid = 'Player-3675-0872E1EC';
        
        $playerObject = (object) ['playerGuid' => $playerGuid];
        
        $this->assertObjectHasAttribute('playerGuid', $playerObject);
        
        $player = new Player();
        $player->setPropertiesFromObject($playerObject);
        
        $this->assertSame($playerGuid, $player->getGuid());
    }
}
