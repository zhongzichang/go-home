<?php



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
    <p>如果您要开车回家，也愿意免费带农民工兄弟老乡回家，那么请点击“我愿意”提交信息</p>

    <a href="drive-info-edit.php" class="ui-btn">我愿意</a>

    <p>如果您是在外打工的农民工兄弟姐妹，或者您的单位有农民工兄弟姐妹因为各种原因无法购买回家的车票，您可以点击“申请”，有机会免费乘坐好心人的车子回家。</p>
    <a href="mount-info-edit.php" class="ui-btn">申请</a>


    <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf0e81c3bee622d60&redirect_uri=http%3A%2F%2Fnba.bluewebgame.com%2Foauth_response.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect" class="ui-btn">微信网页授权测试</a>

    </div><!-- /content -->

    <?php

include("nav_panel.php");

?>


    </div><!-- /page -->

    </body>
    </html>
