<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Noted\Helper\DateTimeHelper;

class DateTimeHelperTest extends TestCase {

    public function testCreateFromMySQLFormat() {
        $dateTime = DateTimeHelper::createFromMySQLFormat('2020-04-11 13:53:00');
        
        $this->assertSame('2020', $dateTime->format('Y'));
        $this->assertSame('04', $dateTime->format('m'));
        $this->assertSame('11', $dateTime->format('d'));
        $this->assertSame('13', $dateTime->format('H'));
        $this->assertSame('53', $dateTime->format('i'));
        $this->assertSame('00', $dateTime->format('s'));
    }
}
