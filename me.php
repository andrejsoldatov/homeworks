<?php
require_once 'user.php';


$user = getUser();
requiredUser($user);

echo 'Здесь будет информация о пользователе '.$user['name'];