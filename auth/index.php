<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_SESSION["user"])) {
    ?>
        <h2>Welcome <?= $_SESSION["user"]; ?></h2>
        <a href="./logout.php">
            <button>Logout</button>
        </a>
    <?php } else { ?>
        <h2>Please <a href="./login.php"><button>Login</button></a></h2>
    <?php } ?>
</body>

</html>