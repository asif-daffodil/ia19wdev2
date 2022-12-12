<?php
include_once("./header.php");
include_once("./navbar.php");

isset($_SESSION['name']) && header("location: ./");

?>
<div class="container">
    <div class="row">
        <?php
        if (isset($_POST['su123'])) {
            $suname = $_POST['suname'];
            $suemail = $_POST['suemail'];
            $supass = $_POST['supass'];

            $supass = md5($supass);
            $checkPReEmail = $conn->query("SELECT * FROM users WHERE email = '$suemail'");

            if ($checkPReEmail->num_rows > 0) {
                echo "<script>toastr.error('email alreadey exicts')</script>";
            } else {
                $insert = $conn->query("INSERT INTO users (name, email, pass) VALUES ('$suname','$suemail','$supass')");
                if ($insert) {
                    echo "<script>toastr.success('User Registration complete!');setTimeout(()=> location.href= './checkuser.php?name=" . $suname . "&email=" . $suemail . "&token=ASDfgh123', 2000)</script>";
                }
            }
        }

        if (isset($_POST['si420'])) {
            $siemail = $_POST['siemail'];
            $sipass = $_POST['sipass'];

            $sipass = md5($sipass);


            $checkUser = $conn->query("SELECT * FROM users WHERE email = '$siemail' AND pass = '$sipass'");
            if ($checkUser->num_rows === 1) {
                $userData = $checkUser->fetch_object();
                echo "<script>toastr.success('Login successfully!');setTimeout(()=> location.href= './checkuser.php?name=" . $userData->name . "&email=" . $userData->email . "&token=ASDfgh123&role=" . $userData->role . "', 2000)</script>";
            } else {
                $errLogin = "<div class='alert alert-danger alert-dismissible'><button class='btn-close' data-bs-dismiss='alert'></button>Login failed</div>";
            }
        }
        ?>
        <div class="col-md-6 py-4">
            <h2 class="mb-4">Sign in</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="email" placeholder="Email Address" name="siemail" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="Password" name="sipass" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="tubmit" class="btn btn-primary btn-sm" name="si420">Sign In</button>
                </div>
            </form>
            <?= $errLogin ?? null ?>
        </div>
        <div class="col-md-6 py-4">
            <h2 class="mb-4">Sign up</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" placeholder="Your Name" name="suname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="email" placeholder="Email Address" name="suemail" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="Password" name="supass" class="form-control" required minlength="6">
                </div>
                <div class="mb-3">
                    <button type="tubmit" class="btn btn-primary btn-sm" name="su123">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>