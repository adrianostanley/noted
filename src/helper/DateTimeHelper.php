<?php

declare(strict_types=1);

namespace Noted\Helper;

use DateTime;

/**
 * This is just a helper class, which contains just static functions.
 * 
 * @author Adriano
 */
class DateTimeHelper {

    /**
     * Converts a time string formatted on the MySQL date and time defaults.
     * 
     * @param string $time
     * @return DateTime
     */
    public static function createFromMySQLFormat(string $time) {
        return DateTime::createFromFormat('Y-m-d H:i:s', $time);
    }

}
