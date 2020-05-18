<?php

declare(strict_types=1);

use Noted\Repository\MySQLDatabaseProvider;
use PHPUnit\Framework\TestCase;

require '../vendor/autoload.php';

abstract class DatabaseTestBase extends TestCase {

	private static MySQLDatabaseProvider $databaseProvider;

	/**
	 * Helper method to ease on the database provider usage.
	 *
	 * @return MySQLDatabaseProvider
	 */
	protected function getDatabaseProvider(): MySQLDatabaseProvider {
		return DatabaseTestBase::$databaseProvider;
	}

	public static function setUpBeforeClass(): void {
		parent::setUpBeforeClass();

		DatabaseTestBase::$databaseProvider = new MySQLDatabaseProvider($GLOBALS['DB_HOST'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'], $GLOBALS['DB_DBNAME']);
	}

	public static function tearDownAfterClass(): void  {
		parent::tearDownAfterClass();

		DatabaseTestBase::$databaseProvider->closeConnection();
	}

}