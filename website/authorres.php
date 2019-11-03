<html>
<head>
<style type="text/css">
table,td,th{border:0px}
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
.image{
	position:absolute;
	left:0%;
	right:0%;
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
$sql1 = "select AuthorID from authors_final
		 where AuthorName like '%".$name."%'";

$result1 = mysql_query($sql1);

$total = mysql_num_rows($result1);//总记录数 
$pageSize = 10; //每页显示数 
$totalPage = ceil($total/$pageSize); //总页数 
$startPage = $page*$pageSize; //开始记录
/*$arr['total'] = $total; 
$arr['pageSize'] = $pageSize; 
$arr['totalPage'] = $totalPage; */

$sql2 = "select AuthorID,AuthorName,papernum,AffiliationName from authors_final
		 where AuthorName like '".$name."%'
		 order by papernum desc limit $startPage,$pageSize";
$result2 = mysql_query($sql2);
if($result2){
echo "<table border='2' cellpadding='10'><tr class='hd'>
  <th>AuthorName</th>
  <th>AffiliationName</th>
    </tr>";
while($row2 = mysql_fetch_array($result2))
  {
	if($row2["AuthorID"]=='7E0DFF97'){echo "<tr><td><a href='https://gss3.bdstatic.com/7Po3dSag_xI4khGkpoWK1HF6hhy/baike/w%3D268%3Bg%3D0/sign=22864f203101213fcf3349da6cdc51ec/8b82b9014a90f603dc1be7be3112b31bb151eda4.jpg'>".$row2["AuthorName"]."</a></td><td>".$row2["AffiliationName"]."</td></tr>";}
  else{
  echo "<tr><td class='hd'><a href='new_1.php?new1=".$row2["AuthorID"]."&new2=".$row2["AuthorName"]."'>".$row2["AuthorName"]."</a></td><td class='hd'>".$row2["AffiliationName"]."</td></tr>";
  /*$arr['list'][] = array(
  'id' => $row2['AuthorID'], 
  'name' => $row2['AuthorName'], 
  'affnm' => $row2['AffiliationName'], 
 );*/ 

  }}
  //echo json_encode($arr);
}
else echo "Not matched";
echo "</table>"?>
<div class="pagebar"><?php echo $page+1?>/<?php echo $totalPage?></br>
</div>
</body>
</html>


