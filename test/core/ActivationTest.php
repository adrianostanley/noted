<?php

declare(strict_types=1);

use Noted\Core\Activation;

final class ActivationTest extends DatabaseTestBase {

    public function testActivation() {
        $activation = new Activation($this->getDatabaseProvider());
        $activation->activatePlugin();
        
		$tables = $this->getDatabaseProvider()->getResults("SELECT table_name AS 'table' FROM information_schema.tables WHERE table_schema = 'noted'");

		$this->assertNotEmpty($tables);
    }
}
