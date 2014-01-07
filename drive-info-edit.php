<?php

?>

<!DOCTYPE html>
<html>
<head>
<title>提交信息 - 有车</title>
<meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no ">
    <link rel="stylesheet" href="jquery.mobile-git.min.css" />
    <script src="jquery-1.10.2.min.js"></script>
    <script src="jquery.mobile-git.min.js"></script>
    </head>
    <body>

    <div data-role="page">

    <div data-role="header">
    <h1>提交信息 - 有车</h1>
  <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
    </div><!-- /header -->

    <div role="main" class="ui-content">

    <form data-ajax="false" action="drive-info-submit.php" enctype="multipart/form-data" method="post">
    <label for="source">出发地：</label>
    <input type="text" name="source" id="source" value="" placeholder="出发地">
    <label for="destination">目的地：</label>
    <input type="text" name="destination" id="destination" value="" placeholder="目的地">
    <label for="">出发日期：</label>
    <input type="date" name="start_date" id="start_date" value="">
    <label for="number_of_people">可乘坐人数：</label>
    <input type="number" name="number_of_people" pattern="[0-9]*" id="number_of_people" value="" placeholder="可乘坐人数">
    <label for="mobile">手机号码：</label>
    <input type="tel" name="mobile" value="" placeholder="手机号码">
    <label for="unit_phone">单位电话：</label>
    <input type="tel" name="unit_phone" value="" placeholder="单位电话">
    <label for="unit_cert">单位证明文件：</label>
    <input type="file" name="unit_cert" id="unit_cert">
    <label for="postscript">附言：</label>
    <textarea cols="40" rows="8" name="postscript" id="postscript"></textarea>
    <input type="submit" value="提交信息">
    
    </form>

    </div><!-- /content -->
<?php

include("nav_panel.php");

?>

    </div><!-- /page -->

    </body>
    </html>
