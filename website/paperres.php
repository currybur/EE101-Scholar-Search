<html>
<head>
<style type="text/css">
table,td,th{border:0px;}
table{
	border-collapse:collapse;
	width:100%;
	}
th{height:50px;font-size:30px;}
.pagebar{
	position:absolute;
	left:15%;
	bottom:-15%;
	background-color:rgba(231, 231, 231,0.3);
}
</style>
</head>
<body>
<?php 
$page = intval($_POST['pageNum']); //当前页
$name = $_POST['name'];

$con = mysql_connect("sqld-gz.bcehost.com","fefb13bf9d84473cb488a1b21251f438","b932fa0cadf84d2aab73847dc7f02dc9");
if (!$con)
  {
  die('Could not connect: '.mysql_error());
  }
mysql_query("set names 'utf8'"); 
mysql_select_db("ZBhYsGIGOzcPfpGBbAml", $con);
$sql1 = "select PaperID from papers
		 where title like '%".$name."%'";

$result1 = mysql_query($sql1);

$total = mysql_num_rows($result1);//总记录数 
$pageSize = 10; //每页显示数 
$totalPage = ceil($total/$pageSize); //总页数 
$startPage = $page*$pageSize; //开始记录
/*$arr['total'] = $total; 
$arr['pageSize'] = $pageSize; 
$arr['totalPage'] = $totalPage; */

$sql2 = "select PaperID,title,PaperPublishYear,ConferenceID from papers
		 where title like '%".$name."%'
		 order by PaperPublishYear desc limit $startPage,$pageSize";
$result2 = mysql_query($sql2);
if($result2){
echo "<table border='2' cellpadding='10'><tr>
  <th>Paper Title</th>
  <th>PaperID</th>
  <th>PaperPublishYear</th>
  <th>ConferenceID</th>
    </tr>";
while($row2 = mysql_fetch_array($result2))
  {

  echo "<tr><td><a href='new_2.php?new1=".$row2["PaperID"]."&new2=".$row2["title"]."'>".$row2["title"]."</a></td><td>".$row2["PaperID"]."</td><td>".$row2["PaperPublishYear"]."</td><td>".$row2["ConferenceID"]."</td></tr>";
  /*$arr['list'][] = array(
  'id' => $row2['AuthorID'], 
  'name' => $row2['AuthorName'], 
  'affnm' => $row2['AffiliationName'], 
 );*/ 
  }
  //echo json_encode($arr);
echo "</table>";
}
else echo "Not matched";

?> 
<div class="pagebar"><?php echo $page+1?>/<?php echo $totalPage?></br>
</body>
</html>


