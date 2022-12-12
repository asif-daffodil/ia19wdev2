<?php
session_start();
isset($_SESSION["user"]) && header("location: ./");


if (isset($_POST['log123'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $_SESSION["user"] = $uname;
    header("location: ./");
}
?>

<form action="" method="post">
    <input type="text" placeholder="Username" name="uname">
    <input type="password" placeholder="Password" name="pass">
    <button type="submit" name="log123">Login</button>
</form>