<?php
if (isset($_POST['sub123'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    if (!empty($fname) && !empty($lname)) {
        $fullName = "Your full name is : $fname $lname";
    }
}
?>
<form action="" method="post">
    <input type="text" placeholder="First Name" name="fname">
    <input type="text" placeholder="Last Name" name="lname">
    <button type="submit" name="sub123">Show Name</button>
</form>

<?= $fullName ?? null ?>