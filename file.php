<?php
$path = null;
if (!empty($_GET['path'])){
    $path = $_GET['path'];
}

if ($path === null){
    header('location: dir.php');
}

$dir = dirname($path);
if (!is_file($path) || strcasecmp(substr($path, -3), 'txt') !== 0) {
    header('location: dir.php?path=' . $dir);
}

if (isset($_POST['content'])){
    file_put_contents($path, $_POST['content']);
}
$content = file_get_contents($path);
?>
<a href="dir.php?path=<?php echo $dir?>">Назад</a>
<br/>
<br/>
Редактируем файл <?php echo $path?><br/>

<form enctype="multipart/form-data" method="post">
    <textarea name="content" cols="80" rows="30"><?php echo $content?></textarea><br/>
    <input type="submit" value="Сохранить">
</form>


