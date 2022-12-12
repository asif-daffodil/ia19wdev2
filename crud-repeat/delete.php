<?php
$conn = mysqli_connect("localhost", "root", "", "ia19b2crudrepeat");
$id = $_GET["id"];
$conn->query("DELETE FROM students WHERE id = $id");
header("location: ./");
