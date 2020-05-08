<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Noted\Domain\Note;
use Noted\Helper\DateTimeHelper;

class NoteTest extends TestCase {

    public function testSetPropertiesFromObject() {
        $noteContent = 'This is a test note!';
        $noteTakenOn = '2020-04-11 13:53:00';
        $playerGuid = 'Player-3675-0872E1EC';
        
        $noteObject = (object) ['noteId' => '1', 'noteContent' => $noteContent, 'playerGuid' => $playerGuid, 'takenOn' => $noteTakenOn];
        
        $this->assertObjectHasAttribute('noteId', $noteObject);
        $this->assertObjectHasAttribute('noteContent', $noteObject);
        $this->assertObjectHasAttribute('takenOn', $noteObject);
        
        $note = new Note();
        $note->setPropertiesFromObject($noteObject);
        
        $this->assertSame(1, $note->getId());
        $this->assertSame($noteContent, $note->getContent());
        $this->assertEquals(DateTimeHelper::createFromMySQLFormat($noteTakenOn), $note->getTakenOn());
        $this->assertSame($playerGuid, $note->getPlayer()->getGuid());
    }
}
