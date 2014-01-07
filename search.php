<?php

define("DEFAULT_COUNT", 10);

require_once("conf.php");
require_once("func.php");

$type = $_GET["type"];
$source = $_GET["source"];
$destination = $_GET["destination"];
$startDate = $_GET["start_date"];
$condition = '';
$count = $_GET["count"];
$start = $_GET["start"];
$limit = '';
$rowSet = array();
$table = null;

if( $type != "mount" ){
  $type = "drive";
 }
$table = $type . "_info";

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


$sql = "select id,source,destination,start_date,number_of_people,postscript from {$table} where ";
if( !IsNullOrEmptyString( $source ) ){

  $condition .= " source like \"%{$source}%\" ";
  
 }

if( !IsNullOrEmptyString( $destination )){
  if(!IsNullOrEmptyString( $condition ) )
     $condition .= " and ";
  $condition .= " destination like \"%{$destination}%\" ";
 }

if( !IsNullOrEmptyString( $startDate )) {
  if(!IsNullOrEmptyString( $condition ) )
     $condition .= " and ";
  $condition .= " start_date = '{$startDate}' ";
 }


if( IsNullOrEmptyString($condition) ){
  $condition = '1';
 }

if( !is_numeric($start) ){

  $start = "0";

 } else {
  $start = strval(intval($start));
 }

if( !is_numeric($count ) ){
  $count = DEFAULT_COUNT;
 } else {

  $count = strval(intval($count));
 }

$limit .= " limit {$start},{$count} ";


$sql .= $condition. $limit;


if( $result = $mysqli->query($sql) ){

  $row_count = $result->num_rows;

  for($i=0; $i < $row_count; $i++ ){
    $row = $result->fetch_assoc();
    array_push($rowSet, $row);
  }

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
  <script src="jquery-1.10.2.min.js"></script>
  <script src="jquery.mobile-git.min.js"></script>
  </head>
  <body>

  <div data-role="page">

  <div data-role="header">
  <h1><?=($type!="mount" ? "出车信息":"搭车信息")?></h1>
  <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
  </div><!-- /header -->

  <div role="main" class="ui-content">

  <div data-role="collapsible">
  <h4>查询条件</h4>


  <form method="get">

  <input type="text" name="source" value="<?=$source?>" placeholder="出发地">
  <input type="text" name="destination" value="<?=$destination?>" placeholder="目的地">
  <label for="start_date">出发日期：</label>
  <input type="date" name="start_date" id="start_date" value="<?=$startDate?>">
  <input type="submit" value="提交">

  </form>

  </div>

	
  <ul data-role="listview" data-inset="true">

  <?php
  if( $type == 'drive' ){
    foreach($rowSet as $row ){
      ?>

      <li>
      <a href="drive-details.php?id=<?=$row['id']?>">
      <h2><?=$row['source']?> - <?=$row['destination']?></h2>
      <p>剩余座位：<?=$row['number_of_people']?></p>
      <p><?=$row['postscript']?></p>
      <p class="ui-li-aside"><strong>出发日期：</strong><?=$row['start_date']?></p>
      </a>
      </li>

      <?php
    }
  } else {

    foreach($rowSet as $row ){
?>
      <li>
      <a href="mount-details.php?id=<?=$row['id']?>">
	<h2><?=htmlspecialchars($row['source'])?> - <?=htmlspecialchars($row['destination'])?></h2>
      <p>需要座位：<?=$row['number_of_people']?></p>
	<p><?=htmlspecialchars($row['postscript'])?></p>
      <p class="ui-li-aside"><strong><?=$row['start_date']?></strong></p>
      </a>
      </li>

    <?php
      }
  }
?>

</ul>
    
</div><!-- /content -->

<?php

include("nav_panel.php");

?>

  </div><!-- /page -->

  </body>
  </html>
