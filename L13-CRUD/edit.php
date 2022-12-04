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
$preData = $check->fetch_object();
if (isset($_POST['voteBtn'])) {
    $name = safe($_POST['name']);
    $team = safe($_POST['team'] ?? null);

    if (empty($name)) {
        $err["name"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> Please write your name!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    if (empty($team)) {
        $err["team"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> Please select your team!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }

    if (!empty($name) && !empty($team)) {
        $name = $conn->real_escape_string($name);
        $team = $conn->real_escape_string($team);
        $updateQuery = "UPDATE `votes` SET `name` = '$name', `team` =  '$team' WHERE `id` = '$id'";
        $update = $conn->query($updateQuery);
        if (!$update) {
            $err["update"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> Database problem!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            $succ = "<script>toastr.success('Data updated successfully');setTimeout(()=>location.href=' L13-crud.php', 2000)</script>"; 
        }
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
            <div class="col-md-5 m-auto border p-4 shadow rounded">
                <h2>Edit User Data</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Your Name" name="name" value="<?= $name ?? $preData->name ?? null ?>">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label for="" class="from-form-check-label">
                                <input type="radio" class="form-form-check-input" value="Brazil" name="team" <?= isset($team) && $team === "Brazil" ? "checked" : null ?> <?= !isset($team) && $preData->team === "Brazil" ? "checked" : null ?>>
                                Brazil
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="" class="from-form-check-label">
                                <input type="radio" class="form-form-check-input" value="Argentina" name="team" <?= isset($team) && $team === "Argentina" ? "checked" : null ?> <?= !isset($team) && $preData->team === "Argentina" ? "checked" : null ?>>
                                Argentina
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Edit" name="voteBtn">
                        <a href="./L13-crud.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>
                </form>
                <?php
                if (isset($err)) {
                    foreach ($err as $e) {
                        echo $e;
                    }
                }
                echo $succ ?? null;
                ?>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>