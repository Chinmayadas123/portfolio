<?php 
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['login'])){
    header("location:portfolio.php");
}
include "header.php";
if (isset($_POST['submit'])) {
    include("connection.php");
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mail = mysqli_real_escape_string($con, $_POST['mail']);
    $mob = mysqli_real_escape_string($con, $_POST['mob']);
    $git = mysqli_real_escape_string($con, $_POST['git']);
    $link = mysqli_real_escape_string($con, $_POST['obj']);
    $adrs = mysqli_real_escape_string($con, $_POST['adrs']);


   $sql = "SELECT email FROM personal_info WHERE email='{$mail}'";

    $res = mysqli_query($con, $sql) or die("Query failed");

    if (mysqli_num_rows($res) > 0) {
        echo "<p style='color:red;text-align:center;margin:10px 0;'> User Already Exist </p>";
    } 
     else{ 
            $sql1 = "INSERT INTO personal_info(name, email, mob, git,obj, adrs) VALUES('{$name}','$mail',{$mob},'{$git}','{$link}','{$adrs}')" or die("query failed");
            $res1 = mysqli_query($con, $sql1) or die("query failed");
        if ($res1) {
            echo "<script> alert('Saved')</script>";
            header("location:personal.php");
        }
    }
}
?>

<body id="register">
    <section id="Home-header">
        <div class="container">
            <div class="row">
            <nav class="navbar navbar-expand-lg ">
                <div class="container">
                <a class="navbar-brand" href="#home">
                        <p>Personal Details</p>
                    </a>
                    <ul class="navbar-nav ms-auto me-auto  mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="personal.php">Home</a>
                            </li>
                    </ul>
                </div>
            </nav>
            </div>
        </div>
    </section>
    <section id="info">
        <div class="container">
            <div class="row">
                <div class="info-box">
                    <form action="<?php $_SERVER['PHP_SELF']; ?> " autocomplete="off" id="form" method="POST">
                        <div class="form-box">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-box">
                            <label>E-Mali</label>
                            <input type="email" name="mail" value="<?php echo $_SESSION['mail'];?>"
                                placeholder="email id" required>
                        </div>
                        <div class="form-box">
                            <label>Mobile</label>
                            <input type="text" name="mob" placeholder="contact Number" required>
                        </div>
                        <div class="form-box">
                            <label>Git Hub</label>
                            <input type="text" name="git" placeholder="github profile link">
                        </div>
                        <div class="form-box">
                            <label>Objective</label>
                            <input type="text" name="obj" placeholder="Your carrer Objective">
                        </div>
                        <div class="form-box">
                            <label>Address</label>
                            <textarea name="adrs" id="" cols="30" rows="1" placeholder="address details"
                                required></textarea>
                        </div>
                        <div class="form-btn">
                            <input type="submit" name="submit" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include "footer.php";?>