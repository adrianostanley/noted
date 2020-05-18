<?php declare(strict_types=1);

namespace Noted\Repository;

use mysqli;

/**
 * Class MySQLDatabaseProvider
 *
 * @package Noted\Repository
 */
class MySQLDatabaseProvider implements DatabaseProvider {

	private mysqli $mysqli;

	public function __construct($host, $username, $password, $database) {
		// Open a connection with the database
		$this->mysqli = new mysqli($host, $username, $password, $database);
		$this->mysqli->set_charset("utf8");
	}

	public function closeConnection(): void {
		if(!isset($this->mysqli)) return;

		$this->mysqli->close();
	}

	public function createTable(string $tableName, string $columns): void {
		$this->query(sprintf('CREATE TABLE %s_%s (%s) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_general_ci;', $this->getDatabasePrefix(), $tableName, $columns));
	}

	public function getDatabasePrefix(): string {
		// TODO: Must be reused after WordPress database provider
		return 'wp';
	}

	public function getResults(string $query): array {
		$queryResult = $this->mysqli->query($query);

		$resultsToReturn = [];

		while ($result = $queryResult->fetch_object()) {
			$resultsToReturn[] = $result;
		}

		$queryResult->close();

		return $resultsToReturn;
	}

	public function query(string $query): int {
		$this->mysqli->query($query);

		return $this->mysqli->affected_rows;
	}

	public function testConnection(): bool {
		if(!isset($this->mysqli)) return false;

		$simpleQueryResult = $this->getResults('SELECT 1 AS connected');

		return count($simpleQueryResult) == 1;
	}
}
