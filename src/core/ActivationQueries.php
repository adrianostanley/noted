<?php

namespace Noted\Core;

class ActivationQueries {
	public static array $playerTable = [
		'tableName' => 'player',
		'columns' => '
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            player_name VARCHAR(55) NOT NULL,
            PRIMARY KEY (id)
        '
	];
}