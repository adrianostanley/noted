<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Noted\Domain\Note;
use Noted\Repository\NoteRepository;

/**
 *
 * @author Adriano
 */
class NoteRepositoryTest extends DatabaseTestBase {

    public function testSelectAllNotes(): void {
        $repository = new NoteRepository($this->getDatabaseProvider());

        $allNotes = $repository->listAll();

        $this->assertCount(3, $allNotes);

        /** @var Note $firstNote */
        $firstNote = $allNotes[0];
        $this->assertSame(1, $firstNote->getId());
        $this->assertSame('First note', $firstNote->getContent());
    }

}
