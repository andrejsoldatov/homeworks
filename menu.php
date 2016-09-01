<?php

require_once 'user.php';


$user = getUser();
requiredUser($user);

$menu = [
    'me' => 'О пользователе '.$user['name'],
    'settings' => 'Настройки',
    'orders'=> 'Заказы',
    'posts' => 'Публикации',
    'out.php' => 'Выход',

];

foreach ($menu as $url => $item){
    echo '<a href="index.php?section='.$url.'">'.$item.'</a><br/>';
}