<?php

/**
 * Created by IntelliJ IDEA.
 * User: dell
 * Date: 3/23/2017
 * Time: 11:26 PM
 */
class SampleMethods
{
    function funcInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace('/','',$data);
        return $data;
    }
}