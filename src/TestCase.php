<?php

namespace Codeception\PHPUnit;


use PHPUnit\Framework\AssertionFailedError;

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
        if (!is_string($needle)) {
            throw new AssertionFailedError('Needle is not string');
        }
        if (!is_string($haystack)) {
            throw new AssertionFailedError('Haystack is not string');
        }
        \Codeception\PHPUnit\TestCase::assertContains($needle, $haystack, $message);
    }

    public static function assertStringNotContainsString($needle, $haystack, $message = '')
    {

        if (!is_string($needle)) {
            throw new AssertionFailedError('Needle is not string');
        }
        if (!is_string($haystack)) {
            throw new AssertionFailedError('Haystack is not string');
        }
        \Codeception\PHPUnit\TestCase::assertNotContains($needle, $haystack, $message);
    }

    public static function assertStringContainsStringIgnoringCase($needle, $haystack, $message = '')
    {
        if (!is_string($needle)) {
            throw new AssertionFailedError('Needle is not string');
        }
        if (!is_string($haystack)) {
            throw new AssertionFailedError('Haystack is not string');
        }
        \Codeception\PHPUnit\TestCase::assertContains($needle, $haystack, $message, true);
    }

    public static function assertStringNotContainsStringIgnoringCase($needle, $haystack, $message = '')
    {

        if (!is_string($needle)) {
            throw new AssertionFailedError('Needle is not string');
        }
        if (!is_string($haystack)) {
            throw new AssertionFailedError('Haystack is not string');
        }
        \Codeception\PHPUnit\TestCase::assertNotContains($needle, $haystack, $message, true);
    }
}
