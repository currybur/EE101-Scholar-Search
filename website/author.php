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
.bond{
	font-weight:700;
 }
 .index{
	position: absolute;
	left:0%;
	right:0%;
	top:40%;
	z-index:3;
}
</style>
</head>
<body>
<?php
$page = intval($_POST['pageNum']);
$author=$_POST['name'];

$con = mysql_connect("sqld-gz.bcehost.com","fefb13bf9d84473cb488a1b21251f438","b932fa0cadf84d2aab73847dc7f02dc9");
if (!$con)
  {
  die('Could not connect: '.mysql_error());
  }
mysql_query("set names 'utf8'"); 
mysql_select_db("ZBhYsGIGOzcPfpGBbAml", $con);
$sql0="select paperid 
	   from paper_author_affiliation 
	   where authorid='".$author."'";
$result0=mysql_query($sql0);
$total = mysql_num_rows($result0);//总记录数 
$pageSize = 10; //每页显示数 
$totalPage = ceil($total/$pageSize); //总页数 
$startPage = $page*$pageSize; //开始记录


$sql1="select paperid,refer_time from paperrefer 
       where paperid in (select paperid 
	   from paper_author_affiliation 
	   where authorid='".$author."') order by refer_time desc limit $startPage,$pageSize";
$result=mysql_query($sql1);
echo "<table border='2' cellpadding='10'><tr>
           <th>Paper Title</th>
          <th>ConferenceName</th>
         <th>Authors from sequence 1</th></tr>";
while($row=mysql_fetch_array($result))
{
	$sql2="select title,conferenceid from papers where paperid = '".$row["paperid"]."'";
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	$sql3="select conferencename from conferences where conferenceid = '".$row2["conferenceid"]."'";
	$result3=mysql_query($sql3);
	$row3=mysql_fetch_array($result3);
	$sql4="select AuthorID from paper_author_affiliation where paperid='".$row["paperid"]."' order by AuthorSequence";
	$result4=mysql_query($sql4);
	echo "<tr><td><a href='new_2.php?new1=".$row["paperid"]."&new2=".$row2["title"]."'>".$row2["title"]."</a></td>";

	echo "<td><a href='new_3.php?new1=".$row2["conferenceid"]."&new2=".$row3["conferencename"]."'>".$row3["conferencename"]."</a></td>";
	echo "<td>";
	while($row4=mysql_fetch_array($result4)){
		$sql5="select AuthorName from authors_final where AuthorID = '".$row4["AuthorID"]."'";
		$result5=mysql_query($sql5);
		$row5=mysql_fetch_array($result5);
		if($row4["AuthorID"]==$author){echo "<a class='bond' href='new_1.php?new1=".$row4["AuthorID"]."&new2=".$row5["AuthorName"]."'>".$row5["AuthorName"]."</a>";}
		else echo "<a href='new_1.php?new1=".$row4["AuthorID"]."&new2=".$row5["AuthorName"]."'>".$row5["AuthorName"]."</a>";
		echo " / / ";
	}
	echo "</td>";
	
}
echo "</table>";
?>
<div class="pagebar"><?php echo $page+1?>/<?php echo $totalPage?></br>


</body>
</html>