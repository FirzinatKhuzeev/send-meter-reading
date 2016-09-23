<?php

$to      = "some@some.ru";
$subject = "Показания счетчиков воды";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: <water-meters@huzferd.ru>" . "\r\n";

$body = "<h1>Показания счетчиков воды</h1>";

if (isset($_POST["settlementaccount"])) {
	$body .= "Лицевой счет: ".$_POST["settlementaccount"]."</br>";
}

$body .= "ФИО: ".$_POST["surname"]." ".$_POST["name"]." ".$_POST["middlename"]."</br>";
$body .= "Адрес: ".$_POST["city"].", ".$_POST["street"].", д. ".$_POST["home"].", кв. ".$_POST["apartment"]."</br>";
$body .= "<strong>Ванная комната:</strong>"."</br>";
$body .= "Счетчик №1. ГВС Значение: ".$_POST["watermeterone"]."</br>";
$body .= "Счетчик №2. ХВС Значение: ".$_POST["watermetertwo"]."</br>";

if (isset($_POST["watermeterthree"]) && isset($_POST["watermeterfour"])) {
    $body .= "<strong>Кухня:</strong>"."</br>";
    $body .= "Счетчик №3. Значение: ".$_POST["watermeterthree"]."</br>";
    $body .= "Счетчик №4. Значение: ".$_POST["watermeterfour"]."</br>";
}

if(isset($_POST["message"])){
	$body .= "</br>"."<strong>Дополнительная информация:</strong>"."</br>".$_POST["message"]."</br>";
}

$success = mail($to, $subject, $body, $headers);

if ($success) {
    echo "success";
} else {
    echo "error";
}

?>
