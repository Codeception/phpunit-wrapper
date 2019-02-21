<?php

namespace Codeception\PHPUnit;


abstract class TestCase extends \PHPUnit\Framework\TestCase
{

    protected function setUp()
    {
        if (method_exists($this, '_setUp')) {
            $this->_setUp();
        }
    }

    protected function tearDown()
    {
        if (method_exists($this, '_tearDown')) {
            $this->_tearDown();
        }
    }

    public static function setUpBeforeClass()
    {
        if (method_exists(get_called_class(), '_setUpBeforeClass')) {
            static::_setUpBeforeClass();
        }
    }

    public static function tearDownAfterClass()
    {
        if (method_exists(get_called_class(), '_tearDownAfterClass')) {
            static::_tearDownAfterClass();
        }
    }

    public static function assertStringContainsString($needle, $haystack, $message = '')
    {
        \Codeception\PHPUnit\TestCase::assertContains($needle, $haystack, $message = '');
    }

    public static function assertStringNotContainsString($needle, $haystack, $message = '')
    {
        \Codeception\PHPUnit\TestCase::assertNotContains($needle, $haystack, $message = '');
    }
}
