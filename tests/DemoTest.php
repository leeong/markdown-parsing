<?php

namespace tests;

use PDO;
use PHPUnit\Framework\TestCase;
use Throwable;

class DemoTest extends TestCase
{
    protected static $dbh;

    public static function setUpBeforeClass()
    {
        self::$dbh = new PDO('sqlite::memory:');
    }

    public static function tearDownAfterClass()
    {
        self::$dbh = null;
    }
    public function testDemo()
    {
        $this->assertInstanceOf('PDO', self::$dbh);
    }
}
