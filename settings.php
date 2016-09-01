<?php
require_once 'user.php';

$user = getUser();
requiredUser($user);

if (isset($_POST['a_color']) || is_uploaded_file(@$_FILES['ava']['tmp_name'])){
    $uploadDir = dirname(__FILE__);
    $uploadFile = $uploadDir . '/' . basename($_FILES['ava']['name']);
    copy($_FILES['ava']['tmp_name'], $uploadFile);
    setSettings([
        'a_color' => $_POST['a_color'],
        'width' => $_POST['width'],
        'head_color' => $_POST['head_color'],
        'footer_color' => $_POST['footer_color'],
        'font' => $_POST['font'],
        'avatar' => $_FILES['ava']['name'],

    ]);

}


$settings = getSettings();
$a_color = (isset($settings['a_color'])? $settings['a_color'] : 'green');
$width = (isset($settings['width'])? $settings['width'] : 30);
$head_color = (isset($settings['head_color'])? $settings['head_color'] : '#f2f2f2');
$footer_color = (isset($settings['footer_color'])? $settings['footer_color'] : '#f2f2f2');
$font = (isset($settings['font'])? $settings['font'] : 16);
$avatar = (isset($settings['avatar'])? $settings['avatar'] : '1.ico');


?>

Настройки: <br/>

<form enctype="multipart/form-data" method="post">
    Изменить цвет ссылок:<br/>
    <input type="text" name="a_color" value="<?=$a_color?>"><br/>
    Изменить цвет хедера:<br/>
    <input type="text" name="head_color" value="<?=$head_color?>"><br/>
    Изменить цвет футера:<br/>
    <input type="text" name="footer_color" value="<?=$footer_color?>"><br/>
    Иизменить ширину меню:<br/>
    <input type="text" name="width" value="<?=$width?>"><br/>
    Иизменить размер шрифта:<br/>
    <input type="text" name="font" value="<?=$font?>"><br/>
    Изменить аватарку:<br/>
    <input type="file" name="ava" value="<?=$avatar?>"/><br/><br/>
    <input type='submit' value='Сохранить'/>
</form>


