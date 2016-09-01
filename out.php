<?php
session_start();

setcookie("id");
unset($_SESSION["id"]);
header('Location: index.php');