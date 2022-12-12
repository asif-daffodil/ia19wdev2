<?php
$conn = mysqli_connect("localhost", "root", "", "ia19b2crudrepeat");

if (isset($_POST["add123"])) {
    $sname = $_POST['sname'];

    $insert = $conn->query("INSERT INTO students (name) VALUES ('$sname')");

    if (!$insert) {
        echo "Something is wrong";
    } else {
        echo "<script>alert('Sudent added successfully')</script>";
    }
}

$select = $conn->query("SELECT * FROM students");
?>

<form action="" method="post">
    <input type="text" placeholder="Student Name" name="sname" required>
    <button type="submit" name="add123">Add Student</button>
</form>
<table width="600" border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>Id</td>
        <td>Student Name</td>
        <td>Action</td>
    </tr>
    <?php
    while ($data = $select->fetch_object()) {
    ?>
        <tr>
            <td><?= $data->id; ?></td>
            <td><?= $data->name; ?></td>
            <td>
                <a href="./update.php?id=<?= $data->id; ?>"><button>Update</button></a>
                <a href="./delete.php?id=<?= $data->id; ?>"><button>Delete</button></a>
            </td>
        </tr>

    <?php
    }
    ?>
</table>