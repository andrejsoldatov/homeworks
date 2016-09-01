<?php
require_once 'user.php';
$name = '';

if (!empty($_POST)) {
    $success = true;
    if (empty($_POST["name"])) {
        echo 'Не указано имя<br/>';
        $success = false;
    }else{
        $name = $_POST["name"];
    }
    if (empty($_POST["password"]) || empty($_POST["password_2"])){
        echo "Пароль не указан<br>";
        $success = false;
    }else{
        if (strcmp($_POST["password"], $_POST["password_2"]) !== 0) {
            echo "Пароли не совпадают<br>";
            $success = false;
        }
    }
    if ($success === true){
        foreach (getAllUsers() as $user){
            if (strcasecmp($user["name"], $name) === 0){
                $success = false;
                echo "Пользователь уже есть такой<br/>";
                break;
            }
        }
    }
    if ($success === true){
        if (regUser($name, $_POST["password"])){
            header('Location: index.php');
            return;
        }
    }
}
?>

<form method="post">
    <input name="name" type="text" placeholder="Enter login" value="<?php echo $name?>" style="color: blue"/><br><br>
    <input name="password" type="password" placeholder="Enter password" style="color: red"/><br><br>
    <input name="password_2" type="password" placeholder="Enter password again" style="color: red"/><br><br>
    <input type="submit" value="Registration"/>
</form>