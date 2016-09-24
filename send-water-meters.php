<?php

$to      = "example@example.com";
$subject = "Показания счетчиков воды";

$headers = "MIME-Version: 1.0"."\r\n";
$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
$headers .= "From: <example@example.com>"."\r\n";

$body = "<h1>Показания счетчиков воды</h1>";

if (isset($_POST["settlementaccount"])) {
	$body .= "<p><strong>Лицевой счет:</strong> ".$_POST["settlementaccount"]."</p>";
}

$body .= "<p>ФИО: ".$_POST["surname"]." ".$_POST["name"]." ".$_POST["middlename"]."</p>";
$body .= "<p>Адрес: ".$_POST["city"].", ".$_POST["street"].", д. ".$_POST["home"].", кв. ".$_POST["apartment"]."</p>";
$body .= "<p><strong>Ванная комната:</strong>"."</p>";
$body .= "<p>Счетчик №1. ГВС Значение: ".$_POST["watermeterone"]."</p>";
$body .= "<p>Счетчик №2. ХВС Значение: ".$_POST["watermetertwo"]."</p>";

if (isset($_POST["watermeterthree"]) && isset($_POST["watermeterfour"])) {
    $body .= "<p><strong>Кухня:</strong>"."</p>";
    $body .= "<p>Счетчик №3. ГВС Значение: ".$_POST["watermeterthree"]."</p>";
    $body .= "<p>Счетчик №4. ХВС Значение: ".$_POST["watermeterfour"]."</p>";
}

if(isset($_POST["message"])){
	$body .= "<p>"."<strong>Дополнительная информация:</strong>"."</p><p>".$_POST["message"]."</p>";
}

$success = mail($to, $subject, $body, $headers);

if ($success) {
    echo "success";
} else {
    echo "error";
}

?>