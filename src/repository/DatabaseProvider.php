<?php

declare(strict_types=1);

namespace Noted\Repository;

/**
 * A database provider must deliver a connection to a database or any other kind
 * of storage to persist entities.
 * 
 * @author Adriano
 */
interface DatabaseProvider {

	/**
     * Must provide a way to create a table in the database.
     * 
     * @param string $tableName
     * @param string $columns
     * @return void
     */
    public function createTable(string $tableName, string $columns) : void;
    
    /**
     * Must return the database prefix.
     * 
     * @return string
     */
    public function getDatabasePrefix() : string;

	/**
	 * Must provide a way to run a SQL query.
	 *
	 * @param string $query
	 * @return int
	 */
	public function query(string $query): int;

	/**
	 * Must provide a way to execute an SQL and return its results.
	 *
	 * @param string $query
	 * @return array
	 */
	public function getResults(string $query): array;

	/**
	 * Must provide a way to test a connection.
	 *
	 * @return bool
	 */
	public function testConnection(): bool;
}