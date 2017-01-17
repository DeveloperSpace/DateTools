<?php

namespace DateToolsTest\Date\Validation;

use DateTools\Date\Validation\BR as Validator;

class BRTest extends \PHPUnit_Framework_TestCase
{
    public function testisEmptyWithNullDate()
    {
        $this->assertEquals(Validator::isEmpty(null), true);
    }

    public function testisEmptyWithStringDate()
    {
        $this->assertEquals(Validator::isEmpty('2016-12-25'), false);
    }

    public function testisEmptyWithZeroIntegerDate()
    {
        $this->assertEquals(Validator::isEmpty(0), false);
    }

    public function testIsValidWithValidDate()
    {
        $this->assertEquals(Validator::isValid('2016-12-25'), true);
    }

    public function testIsValidWithWrongSeparator()
    {
        $this->assertEquals(Validator::isValid('2016/12/25'), true);
    }

    public function testIsValidWithWrongNumberOfDigits()
    {
        $this->assertEquals(Validator::isValid('20165-12-25'), true);
        $this->assertEquals(Validator::isValid('2016-121-25'), true);
        $this->assertEquals(Validator::isValid('2016-12-252'), true);
    }

    public function testIsValidWithInvalidPartOfTheDate()
    {
        $this->assertEquals(Validator::isValid('2016-25-12'), false);
        $this->assertEquals(Validator::isValid('2016-10-33'), false);
    }

    public function testIsValidWithNullDate()
    {
        $this->assertEquals(Validator::isValid(null), false);
    }
}
