<?php

$path = __DIR__;
if (!empty($_GET['path'])){
    $path = $_GET['path'];
}
$dir = scandir($path);
unset($dir[0]);
foreach ($dir as $file) {
    $newPath = $path.'/'.$file;
    $newPath = realpath($newPath);
    $time = fileatime($newPath);
    if (is_dir($newPath)){
        echo '<a href="dir.php?path='.$newPath.'">'.$file.'</a>';
    }else{
        echo '<a href="file.php?path='.$newPath.'">'.$file.'</a>';
    }
    echo ' '.date('[j.m.Y]', $time);
    echo '<br/>';
}
//print_r($dir);