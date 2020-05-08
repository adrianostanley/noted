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
        return get_class(new Note());
    }
    
    protected function getTableName(): string {
        return 'note';
    }

}
