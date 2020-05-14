<?php

declare(strict_types=1);

namespace Noted\Core;

use Noted\Core\ActivationQueries;
use Noted\Repository\DatabaseProvider;

/**
 * This is the main script of the plugin activation.
 *
 * @author Adriano
 */
class Activation {
    
    private DatabaseProvider $databaseProvider;
    
    public function __construct(DatabaseProvider $databaseProvider) {
        $this->databaseProvider = $databaseProvider;
    }

    /**
     * Activate the plugin by running all the required scripts to set it up and
     * make it ready to be used.
     * 
     * @return void
     */
    public function activatePlugin() : void {
        $this->databaseProvider->createTable(ActivationQueries::$playerTable['tableName'], ActivationQueries::$playerTable['columns']);
    }
}

/**
 * This is the main script of the plugin activation.
 *
 * @author Adriano
 */
class ActivationQueries {

    public static $playerTable = [
        'tableName' => 'player',
        'columns' => '
            id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
            player_name VARCHAR(55) NOT NULL,
            PRIMARY KEY (id)
        '
    ];

}