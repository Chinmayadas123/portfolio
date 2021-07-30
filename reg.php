<?php
$msg = "";
if (isset($_POST['submit'])) {
    include "connection.php";
    $mail = mysqli_real_escape_string($con, $_POST['mail']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $cfpass = mysqli_real_escape_string($con, $_POST['cpass']);

    $sql = "SELECT email FROM user WHERE email='{$mail}'";

    $res = mysqli_query($con, $sql) or die("Query failed");

    if (mysqli_num_rows($res) > 0) {
        echo "<p style='color:red;text-align:center;margin:10px 0;'> User Already Exist </p>";
    } else if ($pass == $cfpass) {
        $sql1 = "INSERT INTO user(email,pass) VALUES('{$mail}','{$pass}')";
        $res1 = mysqli_query($con, $sql1) or die("query failed");
        if ($res1) {
            echo "<script> alert('Successfully registred')</script>";
            header("location:portfolio.php");
        }
    } else {
        $msg = "***password not matched";
    }
}
?>

<?php include "header.php";?>
<body id="register">
    <section id="Home-header">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg ">
                <div class="container">
                <a class="navbar-brand" href="#home">
                        <p>Register Here</p>
                    </a>
                </div>
            </nav>
        </div>
    </div>
    </section>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="info-box">
               
                    <form action="<?php $_SERVER['PHP_SELF']; ?> " autocomplete="off" id="form" method="POST">
                        <div class="form-box">
                            <label>E-Mali</label>
                            <input type="email" name="mail" placeholder="email id" required>
                        </div>
                        <div class="form-box">
                            <label>Password</label>
                            <input type="password" name="pass" placeholder="password" required>
                        </div>
                        <div class="form-box">
                            <label>Confrim Password</label>
                            <input type="password" name="cpass" placeholder="password" required>
                        </div>
                        <?php echo "<span style='color:red;text-align:right;'>{$msg}</span>"; ?>
                        <div class="form-btn">
                            <input type="submit" name="submit" value="Register">
                        </div>
                        <div class="wbox ms-auto">
                        <p style="color: white;font-size:18px;">If already registered</p><br>
                     <a class="m-btn" href="login.php">Login</a>
                </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
<?php include "footer.php";?>