<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Noted\Repository\Repository;

final class RepositoryTest extends TestCase {

    public function testFooRepository() : void {
        $repository = new FooRepository(new MockDatabaseProvider());
        
        $this->assertEquals('SELECT * FROM mockdb_foo', $repository->getListAllQuery());
    }
}

final class FooRepository extends Repository {
    
    protected function getTableName(): String {
        return 'foo';
    }
    
    public function getListAllQuery() {
        return $this->buildListAllQuery();
    }

    protected function getEntityClass(): string {
        return null;
    }
}