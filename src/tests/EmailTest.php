<?php
namespace Test;
include('../Email.php');

/**
 * Created by IntelliJ IDEA.
 * User: dell
 * Date: 3/24/2017
 * Time: 12:25 AM
 */


class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function testCanBeCreatedFromValidEmailAddress()
    {
        $this->assertInstanceOf(
            \Email::class,
            \Email::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidArgumentException::class);

        \Email::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            \Email::fromString('user@example.com')
        );
    }
}
