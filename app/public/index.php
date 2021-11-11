<!DOCTYPE html>
<html>
    <head>
        <title>PHP Assignment</title>
    </head>
    <body>
    <form action="/index.php" method="POST">
        <label for="name">First name:</label><br>
        <input type="text" id="firstname" placeholder="Your name here" name="firstname"><br>
        <label for="birthdate">Birthdate:</label><br>
        <input type="date" id="birthdate" name="birthdate"><br><br>
        <input type="submit" name="verzend" value="Submit">
    </form>

    </body>
</html>

<?php
//Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Get the name and birthdate from the URL and echo them
//$name = $_GET['name'];
//$birthdate = $_GET['birthdate'];
//$age = date_diff(date_create($birthdate), date_create('now'))->y;
//echo "Name: $name, Age: $age";

//Get the name and birthdate from the form and echo them if the submit button is clicked and the array isnt null
if(isset($_POST['verzend']))
{
    $name = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];

    if( $name != null && $birthdate != null)
    {
        echo "Name is: $name, DOB: $birthdate";
    }      
    else
    {
        echo "Please fill in your name and DOB!";
    }
}   
?>