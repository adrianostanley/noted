<?php

declare(strict_types=1);

namespace Noted\Domain;

use Noted\Core\Defaults;

/**
 *
 * @author Adriano
 */
class Player extends Entity {
    
    /**
     * A player guid is how Blizzard stores a player id and it's not a numeric
     * value like how Noted ids are treated.
     * 
     * @var string 
     */
    private string $guid = Defaults::TEXT;
    
    function getGuid(): string {
        return $this->guid;
    }

    function setGuid(string $guid): void {
        $this->guid = $guid;
    }    
    
    public function setPropertiesFromObject(?Object $object): void {
        $this->setGuid($object->playerGuid);
    }

}