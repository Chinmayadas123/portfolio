<?php 
session_start();
include("connection.php");
require('vendor/autoload.php');
 $mail = $_SESSION['mail'];
$sql = "SELECT * FROM personal_info where email= '{$mail}'";
$res = mysqli_query($con, $sql) or die("query failled");
$row = mysqli_fetch_assoc($res);
// print_r($row);die("wath");
$sqlq = "SELECT * FROM qualification WHERE email='{$mail}'";
$resq = mysqli_query($con, $sqlq) or die("query failled");
$rowq = mysqli_fetch_assoc($resq);
$sqls = "SELECT * FROM skill WHERE email='{$_SESSION['mail']}'";
$ress = mysqli_query($con, $sqls) or die("query failled");
$rows = mysqli_fetch_assoc($ress);
$sqlp = "SELECT * FROM project WHERE pmail='{$_SESSION['mail']}'";
$resp = mysqli_query($con, $sqlp) or die("query failled");
$rowp = mysqli_fetch_assoc($resp);
if(mysqli_num_rows($res)>0){
  $html='<style type="text/css">
  * { margin: 0; padding: 0; }
  body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
  .clear { clear: both; }
  #page-wrap { width: 800px; margin: 40px auto 60px; }
  #pic { float: right; margin: -30px 0 0 0; }
  h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
  h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
  h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
  p { margin: 0 0 16px 0; }
  a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
  a:hover { border-bottom-style: solid; color: black; }
  ul { margin: 0 0 32px 17px; }
  #objective { width: 500px; float: left; }
  #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
  dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
  dd { width: 600px; float: right; }
  dd.clear { float: none; margin: 0; height: 15px; }
</style>

<body>

<div id="page-wrap">
  <div id="contact-info" class="vcard">
  
      <!-- Microformats! -->
  
      <h1 class="fn">'.$row['name'].'</h1>
      <p>
                Mobile: <span class="tel">'.$row['mob'].'</span><br />
                Email: <a class="email" href="#">'.$row['email'].'</a>
                Github: <a class="email" href="#">'.$row['git'].'</a>

            </p>
        </div>
        <div id="objective">
            <p>
            '.$row['obj'].'
            </p>
        </div>   
        <div class="clear"></div>
         
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
                <h2>'.$rowq['highest_qual'].' </h2>
                <p><strong>From:</strong> '.$rowq['hclg_name'].' <br />
                   <strong>passing year:</strong>'.$rowq['hpassing_year'].' </p>
            </dd>
          
        <dd>
        <h2>'.$rowq['grad'].' </h2>
        <p><strong>From:</strong> '.$rowq['grad_clg'].' <br />
           <strong>passing year:</strong>'.$rowq['grad_passing_year'].' </p>
    </dd>
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                <h2>Programing skills</h2>
                <p>'.$rows['skill'].' , '.$rows['skil2'].' , '.$rows['skil3'].' , '.$rows['skil4'].'  and  '.$rows['skil5'].'</p>
                
                <h2>Computer skills</h2>
                <p>Microsoft productivity software (Word, Excel, etc), Adobe Creative Suite, Windows</p>
            </dd>
            
            <dd class="clear"></dd>
            <dt>Project</dt>
            <dd>
                <h2>Project Undertaken</h2>
                <p>'.$rowp['pname'].'</p>
                <p>'.$rowp['pdesc'].'</p>
            
            <dd class="clear"></dd>
        </div>
        </body>';
}
else{
    $html="not found";
}
//$resume.=file_get_contents("http://localhost/task3/check.php");

$mpdf = new \Mpdf\Mpdf();
// print_r($row);die("wath");
$mpdf->WriteHTML($html);
$mpdf->Output();

?>