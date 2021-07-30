<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['login'])) {
    header("location:index.php");
}
include("connection.php");

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $sql = "SELECT * FROM user WHERE email='$username' and pass='$password'"; 
    $res = mysqli_query($con, $sql) or die("query failled");
    $cnt = mysqli_num_rows($res);
    if ($cnt > 0) {
        while ($row = mysqli_fetch_assoc($res)) {

            $_SESSION['login'] = "yes";
            $_SESSION['mail'] = $row['email'];
            header('location:personal.php');
        }
    } else {


        echo "<script>alert('Please enter correct details')</script>";
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
                        <p>Login Here</p>
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
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" autocomplete="off">
                        <div class="form-box">
                            <label>E-Mali</label>
                            <input type="email" name="email" placeholder="email id" required>
                        </div>
                        <div class="form-box">
                            <label>Password</label>
                            <input type="password" name="pass" placeholder="password" required>
                        </div>
                        <div class="form-btn">
                            <input type="submit"name="submit" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/validate.js"></script>
</body>
</html>