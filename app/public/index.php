<?php
// echo 'Hello World!';
require_once("/app/private/dbconfig.php");

//Try to make a connection with the MySQL DB by using the database.php file and PDO (PHP Data Objects)
try {
    $connection = new PDO("mysql:host=$serverip; dbname=$dbname;", $usr, $psw);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    var_dump($e);
    die("Mr. Stark, I don't feel so good. I don't wanna go, please!");
}

$query = "SELECT * FROM posts";

$qresult = $connection->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Guestbook</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Your Message</h1>
    <form method="POST">
        <section class="form-field">
            <label for="name">Name:</label><br>
            <input type="text" name="name"><br>
        </section>
        <section class="form-field">
            <label for="email">Email:</label><br>
            <input type="text" name="email"><br>
        </section>
        <section class="form-field">
            <label for="message">Message:</label><br>
            <textarea name="message"></textarea>
        </section>
        <section class="form-field">
            <label>&nbsp;</label>
            <input type="submit" name ="verzend" value="Submit">
        </section>
    </form>
    <h1>Other Peoples Messages</h1>
    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Bericht</th>
            <th>IP Adres</th>
        </thead>
        <tbody>
            <?php
            foreach ($qresult as $post) {
            ?>
                <tr>
                    <td><?= $post["name"] ?></td>
                    <td><?= $post["email"] ?></td>
                    <td><?= $post["message"] ?></td>
                    <td><?= $post["ip_address"] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    &nbsp;
 </body>

</html>

<?php
if(isset($_POST["verzend"])){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    if($name != null && $message != null){

        $stmt = $connection->prepare("INSERT INTO posts(posted_at, name, email, message, ip_address) VALUES (now(), :name, :email, :message, :ip_address)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':ip_address', $_SERVER["REMOTE_ADDR"]);

        $stmt->execute();

    }
    else{
        echo "Please fill in all the required fields! (name, message)";
    }
    
}
?>