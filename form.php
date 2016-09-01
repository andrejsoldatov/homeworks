<?php
require_once 'user.php';

$user = getUser();

if ($user === null && !empty($_POST)){
    if (isset($_POST["name"]) && isset($_POST["password"])){
        foreach (getAllUsers() as $userOne){

            if (strcasecmp($userOne["name"], $_POST["name"]) === 0 && $userOne["password"] == $_POST["password"]){
                $user = $userOne;
                authUser($user["id"]);
            }
        }
    }
}

if ($user !== null) {
    header('Location: index.php');
    return;
}


?>
Не авторизирован <br/>
<form method="post">
    <input name="name" type="text" placeholder="Enter login" style="color: blue"/><br><br>
    <input name="password" type="password" placeholder="Enter password" style="color: red"/>
    <input type="submit" value="Let's go!"/>
</form>
<?php
if (isset($_POST["name"])){
    echo "Пользователь ".$_POST["name"].' not found';
}
?>
<br>
<a href="reg.php">Регистрация</a><br>