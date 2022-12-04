<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="./style.min.css">
</head>

<?php

$conn = mysqli_connect("localhost", "root", "", "ia19fifa");
$id = $_GET['id'] ?? header("location: ./L13-crud.php");
$check = $conn->query("SELECT * FROM `votes` WHERE `id` = '$id'");
$check->num_rows != 1 &&  header("location: ./L13-crud.php");

if (isset($_POST['voteBtn'])) {
    $deleteQuery = "DELETE FROM `votes` WHERE `id` = '$id'";
    $delete = $conn->query($deleteQuery);
    if (!$delete) {
        $err["delete"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> Database problem!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else {
        $succ = "<script>toastr.success('Data deleted successfully');setTimeout(()=>location.href= 'L13-crud.php', 2000)</script>";
    }
}

function safe($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

?>


<body>
    <div class="container">
        <div class="row min-vh-100 d-flex">
            <div class="col-md-5 m-auto border p-4 shadow rounded text-center">
                <h2 class="text-danger">Do you realy want to delete the Data></h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="voteBtn"> <i class="fa-solid fa-thumbs-up"></i> Yes</button>
                        <a href="./L13-crud.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> No</a>
                    </div>
                </form>
                <?php
                echo $succ ?? null;
                ?>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>