<?php
require_once 'user.php';


$user = getUser();
requiredUser($user);

echo 'My post';