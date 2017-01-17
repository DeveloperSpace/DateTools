<?php

namespace DateToolsTest\Date\Convertion;

use DateTools\Date\Convertion\BR as Convertion;

class BRTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyDate()
    {
        $this->assertEquals(false, Convertion::convert(''));
    }

    public function testValidDate()
    {
        $this->assertEquals('09/01/2017', Convertion::convert('2017-01-09'));
    }

    public function testInvalidDate()
    {
        $this->assertEquals(false, Convertion::convert('09/01/2017'));
        $this->assertEquals(false, Convertion::convert('099/01/2017'));
        $this->assertEquals(false, Convertion::convert('099/001/2017'));
        $this->assertEquals(false, Convertion::convert('099/001/02017'));
        $this->assertEquals(false, Convertion::convert('2017-001-09'));
        $this->assertEquals(false, Convertion::convert('2017-01-009'));
        $this->assertEquals(false, Convertion::convert('2017-001-009'));
        $this->assertEquals(false, Convertion::convert('9999-99-99'));
        $this->assertEquals(false, Convertion::convert('2017-02-31'));
    }

    public function testIsValidWithNullDate()
    {
        $this->assertEquals(false, Convertion::convert(null));
    }

    public function testIsValidWithWrongSeparator()
    {
        $this->assertEquals(false, Convertion::convert('2017/02/31'));
        $this->assertEquals(false, Convertion::convert('2017 02 31'));
    }
}
