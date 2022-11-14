<?php

function safuda($data)
{
    $kata = htmlspecialchars($data);
    $tata = trim($kata);
    $fata = stripslashes($tata);
    return $fata;
}

if (isset($_POST["sub123"])) {
    $yname = safuda($_POST["yname"]);
    $yemail = safuda($_POST["yemail"]);
    $yage = safuda($_POST["yage"]);
    $yweb = safuda($_POST["yweb"]);

    if (empty($yname)) {
        $errName = "<span style='color: red'>Please enter your name</span>";
    } elseif (!preg_match('/^[A-Za-z. ]*$/', $yname)) {
        $errName = "<span style='color: red'>Invalid name</span>";
    } else {
        $crrName = $yname;
    }

    if (empty($yemail)) {
        $errEmail = "<span style='color: red'>Please enter your email address</span>";
    } elseif (!filter_var($yemail, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "<span style='color: red'>Invalid email address</span>";
    } else {
        $crrEmail = $yemail;
    }

    if (empty($yage)) {
        $errAge = "<span style='color: red'>Please enter your age</span>";
    } elseif (!filter_var($yage, FILTER_VALIDATE_INT)) {
        $errAge = "<span style='color: red'>Invalid age</span>";
    } else {
        $crrAge = $yage;
    }

    if (empty($yweb)) {
        $errWeb = "<span style='color: red'>Please enter your web address</span>";
    } elseif (!filter_var($yweb, FILTER_VALIDATE_URL)) {
        $errWeb = "<span style='color: red'>Invalid website</span>";
    } else {
        $crrWeb = $yweb;
    }

    if (isset($crrName) && isset($crrEmail) && isset($crrAge) && isset($crrWeb)) {
        echo "Data Database e chole gese";
        $yname = $yemail = $yage = $yweb = null;
    }
}
?>
<form action="" method="post">
    <input type="text" placeholder="Your Name" name="yname" value="<?= $yname ?? null ?>">
    <?= $errName ?? null ?>
    <br><br>
    <input type="text" placeholder="Your Email" name="yemail" value="<?= $yemail ?? null ?>">
    <?= $errEmail ?? null ?>
    <br><br>
    <input type="text" placeholder="Your Age" name="yage" value="<?= $yage ?? null ?>">
    <?= $errAge ?? null ?>
    <br><br>
    <input type="text" placeholder="Your Website" name="yweb" value="<?= $yweb ?? null ?>">
    <?= $errWeb ?? null ?>
    <br><br>
    <button type="submit" name="sub123">Sign Up</button>
</form>