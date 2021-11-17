<?php
// echo 'Hello World!';
require_once("/app/private/dbconfig.php");

//Try to make a connection with the MySQL DB by using the database.php file and PDO (PHP Data Objects)
try{
    $connection = new PDO("mysql:host=$serverip; dbname=$dbname;", $usr, $psw);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "DB Connected!";
} catch (PDOException $e) {
    var_dump($e);
    die("Mr. Stark, I don't feel so good. I don't wanna go, please!");
}

$query = "SELECT * FROM posts";

$qresult = $connection->query($query);

foreach($qresult as $post) {
    echo "<br><br>" . $post["name"] . "<br>";
    echo $post["email"]. "<br>";
    echo $post["message"]. "<br>";
    echo $post["ip_address"]. "<br>";
}