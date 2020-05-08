<?php

require '../src/core/Defaults.php';

require '../src/domain/Entity.php';
require '../src/domain/Note.php';
require '../src/domain/Player.php';

require '../src/helper/DateTimeHelper.php';

require '../src/repository/DatabaseProvider.php';
require '../src/repository/Repository.php';
require '../src/repository/NoteRepository.php';

use Noted\Repository\DatabaseProvider;

final class MockDatabaseProvider implements DatabaseProvider {
    
    public $tables = array();
    
    public function getResults(string $sql) : array {
        if ('SELECT * FROM mockdb_note' == $sql) {
            return [
                (object) ['noteId' => '1', 'noteContent' => 'First note', 'playerGuid' => 'Player-3675-0872E1EC', 'takenOn' => '2020-01-01 00:00:00'],
                (object) ['noteId' => '2', 'noteContent' => 'Second note', 'playerGuid' => 'Player-3675-0872E1EC', 'takenOn' => '2020-01-01 00:00:00'],
                (object) ['noteId' => '3', 'noteContent' => 'Third note', 'playerGuid' => 'Player-3675-0872E1EC', 'takenOn' => '2020-01-01 00:00:00']
            ];
        }
        return [];
    }

    public function createTable(string $tableName, string $columns): void {
        // Just pretend the table was created in the database
        $this->tables[] = $tableName;
    }

    public function getDatabasePrefix(): string {
        return 'mockdb';
    }

}