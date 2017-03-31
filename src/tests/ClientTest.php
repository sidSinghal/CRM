<?php
namespace Test;
include('../SampleMethods.php');
/**
 * Created by IntelliJ IDEA.
 * User: dell
 * Date: 3/23/2017
 * Time: 6:50 PM
 */



class ClientTest extends \PHPUnit_Framework_TestCase
{

    function test_sanitizeInput()    {
        $data = 'sajdfj//';
        $obj = new \SampleMethods();
        $newData = $obj->funcInput($data);

        echo $newData;
        $this->assertNotEquals($data,$newData,"test failed");
    }


}
