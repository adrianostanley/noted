<?php

declare(strict_types=1);

namespace Noted\Repository;

use Noted\Domain\Note;

/**
 *
 * @author Adriano
 */
class NoteRepository extends Repository {

    protected function getEntityClass(): string {
        return Note::class;
    }
    
    protected function getTableName(): string {
        return 'note';
    }

}
