<?php
include_once("./header.php");
include_once("./navbar.php");
!isset($_SESSION['name']) && header("location: ./");

if (isset($_POST['si420'])) {
    $siemail = $conn->real_escape_string($_POST['siemail']);
    $siname = $_POST['siname'];

    if ($_SESSION['email'] != $siemail) {
        $checkEmail = $conn->query("SELECT * FROM users WHERE email = '$siemail'");
        if ($checkEmail->num_rows > 0) {
            echo "<script>toastr.error('email alreadey exicts')</script>";
        } else {
            $crrEmail = $siemail;
        }
    } else {
        $crrEmail = $siemail;
    }

    if (isset($crrEmail)) {
        $useremail = $conn->real_escape_string($_SESSION['email']);
        $changeUserData = $conn->query("UPDATE users SET name = '$siname', email = '$siemail' WHERE email = '$useremail'");
        if ($changeUserData) {
            echo "<script>toastr.success('user data changed')</script>";
            $_SESSION['email'] = $siemail;
            $_SESSION['name'] = $siname;
        } else {
            echo "<script>toastr.error('Database problem')</script>";
        }
    }
}
?>
<div class="container">
    <div class="row min-vh-100 d-flex">
        <div class="col-md-5 p-4 m-auto border rounded shadow">
            <h2 class="mb-3">Profile Settings</h2>
            <form action="" method="post">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="email" placeholder="Email Address" name="siemail" class="form-control" required value="<?= $_SESSION['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Your Name" name="siname" class="form-control" required value="<?= $_SESSION['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <button type="tubmit" class="btn btn-primary btn-sm" name="si420">Change Data</button>
                    </div>
                </form>
            </form>
        </div>
    </div>
</div>


<?php
include_once("./footer.php");
?>