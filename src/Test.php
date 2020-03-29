<?php


namespace Codeception\PHPUnit;

use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\Test as PHPUnitTest;
use PHPUnit\Framework\TestResult;

/**
 * This class abstracts signature differences between different versions of PHPUnit
 */
abstract class Test implements PHPUnitTest, SelfDescribing
{

    /**
     * @inheritDoc
     */
    public function toString()
    {
        return $this->_toString();
    }

    /**
     * @inheritDoc
     */
    public function run(TestResult $result = null)
    {
        return $this->_run($result);
    }

    abstract public function _toString();

    abstract public function _run(TestResult $result = null);
}
