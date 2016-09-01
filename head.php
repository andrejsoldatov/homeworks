

<?php
require_once 'user.php';


$user = getUser();
requiredUser($user);

echo 'Вы авторизированы как  '.$user["name"].' | <a href="out.php">Выход</a><br>';



$settings = getSettings();
$avatar = (isset($settings['avatar'])? $settings['avatar'] : '1.ico');




?>

<img src="<?=$avatar?>" alt="avatar"/>