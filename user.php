<?php
session_start();

function requiredUser($user)
{
    if ($user === null){
        header('location: form.php');
        die();
    }
    
}

function getSettings()
{
    $user = getUser();
    requiredUser($user);
    $path = md5($user['name']).'.settings';
    if (file_exists($path)) {
        $settings = file_get_contents($path);
        return unserialize($settings);
    }else{
        return[];
    }
}

function setSettings($settings)
{
    $user = getUser();
    requiredUser($user);
    file_put_contents(md5($user['name']).'.settings', serialize($settings));   
}

function getAllUsers()
{
    $users = [];
    $usersPath = 'users.array';
    if (file_exists($usersPath)){
        $users = unserialize(file_get_contents($usersPath));
    }
    return $users;
}

function getUser()
{

    $user = null;
    if (isset($_SESSION["id"])){
        foreach (getAllUsers() as $userOne){
            if ($userOne["id"] == $_SESSION["id"]){
                $user = $userOne;
            }
        }
    }
    return $user;
}
function authUser($id)
{
    $_SESSION["id"] = $id;
}

function regUser($name, $password)
{
    $users = getAllUsers();
    $maxid = 0;
    foreach ($users as $user){
        $maxid = max($maxid, $user["id"]);
    }
    $users[] = [
        "id" => ++$maxid,
        "name" => $name,
        "password" => $password
    ];
    $usersPath = 'users.array';
    file_put_contents($usersPath, serialize($users));
    authUser($maxid);
    return true;
}