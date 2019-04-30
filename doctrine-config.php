<?php
$paths     = array('App/Model');
$isDevMode = \TRUE;

$dbParams = array(
    'driver' => Framework\Configuration::DB_DRIVER,
    'user' => Framework\Configuration::DB_USER,
    'password' => Framework\Configuration::DB_PASS,
    'dbname' => Framework\Configuration::DB_NAME
);