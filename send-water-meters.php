<?php

$to      = "kollinz@bk.ru";
$subject = "Показания счетчиков воды";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: <water-meters@huzferd.ru>" . "\r\n";

$body = "<h1>Показания счетчиков воды</h1>";
$body .= "ФИО: ".$_POST["surname"]." ".$_POST["name"]." ".$_POST["middlename"]."</br>";
$body .= "Адрес: ".$_POST["city"].", ".$_POST["street"].", д. ".$_POST["home"].", кв. ".$_POST["apartment"]."</br>";
if (isset($_POST["settlementaccount"])) {
	$body .= "Лицевой счет: ".$_POST["settlementaccount"]."</br>";
}
$body .= "Счетчик №1. Значение: ".$_POST["watermeterone"]." Тип водоснабжения: ".($_POST[""] ? "Горячее водоснабжение" : "Холодное водоснабжение")."</br>";
$body .= "Счетчик №2. Значение: ".$_POST["watermetertwo"]." Тип водоснабжения: ".($_POST[""] ? "Горячее водоснабжение" : "Холодное водоснабжение")."</br>";
if (isset($_POST["watermeterthree"])) {
    $body .= "Счетчик №3. Значение: ".$_POST["watermeterthree"]." Тип водоснабжения: ".($_POST[""] ? "Горячее водоснабжение" : "Холодное водоснабжение")."</br>";
}
if (isset($_POST["watermeterfour"])) {
    $body .= "Счетчик №4. Значение: ".$_POST["watermeterfour"]." Тип водоснабжения: ".($_POST[""] ? "Горячее водоснабжение" : "Холодное водоснабжение")."</br>";
}
if(isset($_POST["message"])){
	$body .= "Дополнительная информация: ".$_POST["message"]."</br>";
}

$success = mail($to, $subject, $body, $headers);

if ($success) {
    echo "success";
} else {
    echo "error";
}

?>