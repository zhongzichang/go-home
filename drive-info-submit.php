<?php
require_once("conf.php");
require_once("func.php");

$source = $_POST["source"];
$destination = $_POST["destination"];
$startDate = $_POST["start_date"];
$numberOfPeople = $_POST["number_of_people"];
$mobile = $_POST["mobile"];
$unitPhone = $_POST["unit_phone"];
$postscript = $_POST["postscript"];
$unit_cert = GenerateRandomString(32);

$temp = explode(".", $_FILES["unit_cert"]["name"]);

$extension = end($temp);

if ( in_array($_FILES["unit_cert"]["type"], $allowed_image_mime_type)
     && ($_FILES["unit_cert"]["size"] < $allowed_image_file_size)
     && in_array($extension, $allowed_image_exts) )
  {
    if ($_FILES["unit_cert"]["error"] > 0)
      {
	echo "Error: " . $_FILES["unit_cert"]["error"] . "<br>";
      }
    else
      {
	echo "Upload: " . $_FILES["unit_cert"]["name"] . "<br>";
	echo "Type: " . $_FILES["unit_cert"]["type"] . "<br>";
	echo "Size: " . ($_FILES["unit_cert"]["size"] / 1024) . " kB<br>";
	echo "Stored in: " . $_FILES["unit_cert"]["tmp_name"];

	if (file_exists("upload/" . $_FILES["unit_cert"]["name"]))
	  {
	    echo $_FILES["unit_cert"]["name"] . " already exists. ";
	  }
	else
	  {
	    
	    move_uploaded_file($_FILES["unit_cert"]["tmp_name"],
			       "upload/" . $unit_cert);
	  }
      }
  }
 else
   {
     echo "Invalid file";
   }


$mysqli = new mysqli($db_host, $db_username, $db_password, $db_schema);

/* check connection */
if (mysqli_connect_errno())
  {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }

/* change character set to utf8 */
if (!$mysqli->set_charset("utf8")) 
  {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
  }
 else
   {
     //printf("Current character set: %s\n", $mysqli->character_set_name());
   }


$sql = "insert into drive_info(`source`,`destination`,`start_date`,`number_of_people`,`mobile`,`unit_phone`,`postscript`,`unit_cert`)"
  ." values(?,?,?,?,?,?,?,?)";

if( $stmt = $mysqli->prepare($sql) ){

  $stmt->bind_param("sssissss", $source, $destination, $startDate, $numberOfPeople, $mobile, $unitPhone, $postscript, $unit_cert);

  $stmt->execute();

  $stmt->close(); 

 }


/* close connection */
$mysqli->close();


?>

<!DOCTYPE html>
<html>
<head>
<title>送老乡回家</title>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <link rel="stylesheet" href="jquery.mobile-git.min.css" />
  <script src="jquery-1.10.2.min.js"></script>
  <script src="jquery.mobile-git.min.js"></script>
  </head>
  <body>

  <div data-role="page">

  <div data-role="header">
  <h1>送老乡回家</h1>
  <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
  </div><!-- /header -->

  <div role="main" class="ui-content">

  <p>信息已提交。</p>

  <a href="./" class="ui-btn ui-btn-inline">返回首页</a>
	    
  </div><!-- /content -->

  <?php

  include("nav_panel.php");

?>

</div><!-- /page -->

</body>
</html>
