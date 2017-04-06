<?php


DEFINE('DATABASE_USER', 'karthik');
DEFINE('DATABASE_PASSWORD', 'abcd1234');
DEFINE('DATABASE_HOST', 'csye6225team2.cdhrfxkbwgbm.us-east-1.rds.amazonaws.com:3306');
DEFINE('DATABASE_NAME', 'testcrm1');


define('EMAIL', 'chandrashekar.k@husky.neu.edu');


$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,
    DATABASE_NAME);

if (!$dbc) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}


?>
