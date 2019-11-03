<?php
$host="sqld-gz.bcehost.com";
$db_user="fefb13bf9d84473cb488a1b21251f438";
$db_pass="b932fa0cadf84d2aab73847dc7f02dc9";
$db_name="ZBhYsGIGOzcPfpGBbAml";
$timezone="Asia/Shanghai";

$link=mysql_connect($host,$db_user,$db_pass);
mysql_select_db($db_name,$link);
mysql_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
?>
