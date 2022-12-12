<?php
$conn = mysqli_connect("localhost", "root", "", "ia19b2crudrepeat");
$id = $_GET["id"];
$select = $conn->query("SELECT * FROM students WHERE id = $id");
$preData = $select->fetch_object();

if (isset($_POST["up123"])) {
    $sname = $_POST['sname'];

    $update = $conn->query("UPDATE students SET name = '$sname' WHERE id = $id");

    if (!$update) {
        echo "Something is wrong";
    } else {
        echo "<script>alert('Sudent updated successfully')</script>";
    }
}

$select = $conn->query("SELECT * FROM students");
?>

<form action="" method="post">
    <input type="text" placeholder="Student Name" name="sname" required value="<?= $preData->name; ?>">
    <button type="submit" name="up123">Update Student</button>
</form>