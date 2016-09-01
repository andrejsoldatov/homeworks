<?php
$pass = "440081";
var_dump($pass);

$hash = md5($pass);
var_dump($hash);

$hash1 = sha1($pass);
var_dump($hash1);

$hash2 = sha1($hash1);
var_dump($hash2);