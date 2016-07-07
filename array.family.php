<?php
$me = [
    "имя" => "Андрей",
    "возраст" => 28,
    "пол" => "мужской",
    "рост" => 180,
    "семейное положение" => "женат"
];
$wife = [
    "имя" => "Ирина",
    "возраст" => 28,
    "пол" => "женский",
    "рост" => 170,
    "семейное положение" => "замужем"];
$child1 = [
    "имя" => "Дмитрий",
    "возраст" => 2,
    "пол" => "мужской",
    "рост" => 95,
    "семейное положение" => "не женат"];

$children = ["сын"=>$child1];
$family = ["я"=>$me, "жена"=>$wife, "дети"=>$children];
//echo "<pre>";
//print_r($family);
//echo "</pre>";

function listOfChildren($family) {
    echo "Список детей: ".$family["дети"]["сын"]["имя"];
}
listOfChildren($family);

echo "<br>";

function ageOfChildren ($family) {
    echo $family["дети"]["сын"]["имя"]." ".$family["дети"]["сын"]["возраст"]." лет";
}
ageOfChildren($family);

echo "<br>";

function me($family) {
    echo "Мой рост состовляет ".$family["я"]["рост"]." сантиметров и мне ".$family["я"]["возраст"]." лет";

}
me($family);

echo "<br>";

function wife($family) {
    echo "Супрга ".$family["жена"]["имя"];
}
wife($family);

echo "<br>";


function age($family) {
    foreach ($family as $members => $inner_key){
        foreach ($inner_key as $key=>$item) {
            if ($key == "возраст") {
                $inner_key[$key] = $item + 1;
                echo $inner_key[$key]." ";
            }
        }
    }
    foreach ($inner_key as $age=>$year) {
        foreach ($year as $k=>$i) {
            if ($k == "возраст") {
                $inner_key[$k] = $i + 1;
                echo $inner_key[$k]." ";
            }
        }
    }

}

age($family);

echo "<br>";

function whoIsHigher ($family) {
    if ($family["я"]["рост"]>$family["жена"]["рост"]) {
        $raz = $family["я"]["рост"]-$family["жена"]["рост"];
        echo $family["я"]["имя"]." выше ".$family["жена"]["имя"]." на ".$raz." сантиметров";
    }elseif ($family["я"]["рост"]<$family["жена"]["рост"]){
        $raz = $family["жена"]["рост"]-$family["я"]["рост"];
        echo $family["я"]["имя"]." ниже ".$family["жена"]["имя"]." на ".$raz." сантиметров";
    }else{
        echo "У нас с женой одинаковый рост - ".$family["я"]["рост"]." сантиметров";
    }
}

whoIsHigher ($family);
