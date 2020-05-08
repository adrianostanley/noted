<?php

declare(strict_types=1);

namespace Noted\Domain;

use DateTime;
use Noted\Domain\Player;
use Noted\Helper\DateTimeHelper;

/**
 *
 * @author Adriano
 */
class Note extends Entity {

    private int $id;
    private string $content;
    private Player $player;
    private DateTime $takenOn;

    function getId(): int {
        return $this->id;
    }

    function getContent(): string {
        return $this->content;
    }

    function getPlayer(): Player {
        return $this->player;
    }

    function getTakenOn(): DateTime {
        return $this->takenOn;
    }

    function setId(int $id): void {
        $this->id = $id;
    }

    function setContent(string $content): void {
        $this->content = $content;
    }

    function setPlayer(Player $player): void {
        $this->player = $player;
    }

    function setTakenOn(DateTime $takenOn): void {
        $this->takenOn = $takenOn;
    }

    public function setPropertiesFromObject(?Object $object): void {
        $this->setId((int) $object->noteId);
        $this->setContent($object->noteContent ?? null);
        $this->setTakenOn(DateTimeHelper::createFromMySQLFormat($object->takenOn));
        
        $this->setPlayer(new Player());
        $this->getPlayer()->setPropertiesFromObject($object);
    }

}
