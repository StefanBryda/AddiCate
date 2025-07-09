<?php
$host = "mysql";
$dbname = "addicate";
$user = "root";
$pass = "qwerty";

try {
    $dbHandler = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
    die();
}
?>
