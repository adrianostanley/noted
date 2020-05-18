<?php declare(strict_types=1);

final class MySQLDatabaseProviderTest extends DatabaseTestBase {

	public function testConnection() {
		$this->assertTrue($this->getDatabaseProvider()->testConnection());
	}

	public function testCreateTable() {
		$testTableName = 'phpunit';
		$testTableNameWithPrefix = sprintf('%s_%s', $this->getDatabaseProvider()->getDatabasePrefix(), $testTableName);

		$this->getDatabaseProvider()->createTable($testTableName, 'id BIGINT');

		$tableResults = $this->getDatabaseProvider()->getResults(sprintf("SELECT table_name AS 'table' FROM information_schema.tables WHERE table_schema = 'noted' AND table_name='%s'", $testTableNameWithPrefix));

		$tableFirstResult = $tableResults[0];

		$this->assertObjectHasAttribute('table', $tableFirstResult);
		$this->assertSame($testTableNameWithPrefix, $tableFirstResult->table);
	}

	public function testQuery() {
		$queryResult = $this->getDatabaseProvider()->query('SELECT 1');

		$this->assertSame(1, $queryResult);
	}
}