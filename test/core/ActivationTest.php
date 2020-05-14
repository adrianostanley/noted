<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Noted\Core\Activation;

final class ActivationTest extends TestCase {

    public function testActivation() {
        $databaseProvider = new MockDatabaseProvider();
        
        $activation = new Activation($databaseProvider);
        $activation->activatePlugin();
        
        $this->assertCount(1, $databaseProvider->tables);
    }
}
