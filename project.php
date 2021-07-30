<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    header("location:portfolio.php");
}
include "header.php";
if (isset($_POST['submit'])) {
    include("connection.php");
    if (isset($_FILES['pimg'])) {
        $error = array();
        $file_name = $_FILES['pimg']['name'];
        $file_size = $_FILES['pimg']['size'];
        $file_type = $_FILES['pimg']['type'];
        $file_tmp_name = $_FILES['pimg']['tmp_name'];
        $file_ext = end(explode('.', $file_name));
        $ext = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $ext) === false) {
            $error[] = "These extensions are not alowed,please choose a JPG or PNG file";
        }
        if ($file_size > 2097152) {
            $error[] = "File size too much , please enter 2mb or lower";
        }
        if (empty($error) == true) {
            $chkr=move_uploaded_file($file_tmp_name,'upload/' . $file_name);
        } else {
            print_r($error);
            die();
        }
    }
    $mail = mysqli_real_escape_string($con, $_SESSION['mail']);
    $name = mysqli_real_escape_string($con, $_POST['pname']);
    $desc = mysqli_real_escape_string($con, $_POST['pdesc']);

    $sql1 = "INSERT INTO project(pmail, pname, pdesc, pimg) VALUES('{$mail}','{$name}','{$desc}','{$file_name}')";

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
                        <p>Project Details</p>
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
    <section id="project">
        <div class="container">
            <div class="row">
                <div class="info-box">
                    <form action="<?php $_SERVER['PHP_SELF']; ?> " autocomplete="off" id="form" method="POST" enctype="multipart/form-data">
                        <div class="form-box">
                            <label>Project Title</title></label>
                            <input type="text" name="pname" placeholder="Project Name" required>
                        </div>
                        <div class="form-box">
                            <label> Project Description</label>
                            <input type="text" name="pdesc" placeholder="Description" required>
                        </div>
                        <div class="form-box">
                            <label>Project Picture</label>
                            <input type="file" name="pimg" required>
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