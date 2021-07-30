<?php 
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['login'])){
    header("location:welcome.php");
}
include "header.php";
if (isset($_POST['submit'])) {
    include("connection.php");
    $mail = mysqli_real_escape_string($con,$_SESSION['mail']);
    $hqul = mysqli_real_escape_string($con, $_POST['hqul']);
    $hclg = mysqli_real_escape_string($con, $_POST['hclg']);
    $hyr = mysqli_real_escape_string($con, $_POST['hyr']);
    $hmrk = mysqli_real_escape_string($con, $_POST['hmrk']);
    $grad = mysqli_real_escape_string($con, $_POST['grad']);
    $gclg = mysqli_real_escape_string($con, $_POST['gclg']);
    $gyr = mysqli_real_escape_string($con, $_POST['gyr']);
    $gmrk = mysqli_real_escape_string($con, $_POST['gmrk']);
    $tstrm = mysqli_real_escape_string($con, $_POST['tstrm']);
    $tclg = mysqli_real_escape_string($con, $_POST['tclg']);
    $tyr = mysqli_real_escape_string($con, $_POST['tyr']);
    $tmark = mysqli_real_escape_string($con, $_POST['tmark']);
    $xboard = mysqli_real_escape_string($con, $_POST['xboard']);
    $xschl = mysqli_real_escape_string($con, $_POST['xschl']);
    $xyr = mysqli_real_escape_string($con, $_POST['xyr']);
    $xmrk = mysqli_real_escape_string($con, $_POST['xmrk']);

    $sql1 ="INSERT INTO qualification(email, highest_qual, hclg_name, hpassing_year, hmark, grad, grad_clg, grad_passing_year, grad_mark, xii_stream, xii_clg, xii_passing_year, xii_mark,x_school, x_passing_year, x_mark) VALUES('{$mail}','{$hqul}','{$hclg}','{$hyr}',{$hmrk},'{$grad}','{$gclg}','{$gyr}',{$gmrk},'{$tstrm}','{$tclg}','{$tyr}',{$tmark},'{$xschl}','{$xyr}',{$xmrk})";
           
    $res1 = mysqli_query($con, $sql1) or die("query failed");
        
    if ($res1) {
            echo "<script> alert('Saved')</script>";
            header("location:personal.php");
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
                                <label>Highest Qualification</label>
                                <input type="text" name="hqul" required placeholder="Enter your highest qualification">
                            </div>
                            <div class="form-box">
                                <label>College Or University Name </label>
                                <input type="text" name="hclg" required placeholder="College Name">
                            </div>

                            <div class="form-box">
                                <label>Passing Year</label>
                                <input type="text" name="hyr" required placeholder="Passing Year">
                            </div>
                            <div class="form-box">
                                <label>Marks</label>
                                <input type="text" name="hmrk" required placeholder="In Percentage">
                            </div>
                            <div class="form-box">
                                <label>Graduation</label>
                                <input type="text" name="grad" required placeholder="Graduation Stream">
                            </div>
                            <div class="form-box">
                                <label>College Or University Name </label>
                                <input type="text" name="gclg" required placeholder="College Name">
                            </div>

                            <div class="form-box">
                                <label>Passing Year</label>
                                <input type="text" name="gyr" required placeholder="Passing Year">
                            </div>
                            <div class="form-box">
                                <label>Marks</label>
                                <input type="text" name="gmrk" required placeholder="In Percentage">
                            </div>
                            <div class="form-box">
                                <label>XII Stream</label>
                                <input type="text" name="tstrm" required placeholder="like Science,Arts.....">
                            </div>
                            <div class="form-box">
                                <label>College</label>
                                <input type="text" name="tclg" required placeholder="College Name">
                            </div>

                            <div class="form-box">
                                <label>Passing Year</label>
                                <input type="text" name="tyr" placeholder="Passing Year">
                            </div>
                            <div class="form-box">
                                <label>Marks</label>
                                <input type="text" name="tmark" placeholder="In Percentage">
                            </div>
                            <div class="form-box">
                                <label>School</label>
                                <input type="text" name="xschl" placeholder="School Name">
                            </div>

                            <div class="form-box">
                                <label>Passing Year</label>
                                <input type="text" name="xyr" placeholder="Passing Year">
                            </div>
                            <div class="form-box">
                                <label>Marks</label>
                                <input type="text" name="xmrk" placeholder="In Percentage">
                            </div>
                            <div class="form-btn">
                                <input type="submit" name="submit" value="Submit">
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
    </body>
    </html>
</html>