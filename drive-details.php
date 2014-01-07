<?php

require_once("conf.php");
require_once("func.php");

$id = $_GET["id"];
$row = null;

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


$sql = "select * from drive_info where id={$id} ";


if( $result = $mysqli->query($sql) ){

  $row = $result->fetch_assoc();


  $result->close();

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
  <style>
  .img {width:100%;}
  </style>

  <script src="jquery-1.10.2.min.js"></script>
  <script src="jquery.mobile-git.min.js"></script>
  <script>
  $( document ).on( "pagecreate", function() {
      $( ".photopopup" ).on({
	popupbeforeposition: function() {
	    var maxHeight = $( window ).height() - 60 + "px";
	    $( ".photopopup img" ).css( "max-height", maxHeight );
	  }
	});
    });
</script>
</head>
<body>

<div data-role="page">

  <div data-role="header">
  <h1>出车详细信息</h1>
  <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
  </div><!-- /header -->

  <div role="main" class="ui-content">

  <div class="ui-body ui-body-a ui-corner-all">
  <h3><?=$row["source"]?> - <?=$row["destination"]?></h3>
  <p>出发日期：<?=$row["start_date"]?></p>
  <p>剩余座位：<?=$row["number_of_people"]?></p>
  <p>联系电话：<a href="tel:<?=$row["mobile"]?>"><?=$row["mobile"]?></a></p>
  <p>单位电话：<a href="tel:<?=$row["unit_phone"]?>"><?=$row["mobile"]?></a></p>
  <p>
  <?=htmlspecialchars($row["postscript"])?>
  </p>

  </div>

  <?php
  if( !IsNullOrEmptyString($row["unit_cert"]) )
    {
  ?>

<h3>单位证明文件</h3>
  <img src="upload/<?=$row["unit_cert"]?>" alt="unit cert" class="img">
  <?php
  }
?>

  </div><!-- /content -->


  <?php

  include("nav_panel.php");

?>

</div><!-- /page -->

</body>
</html>
