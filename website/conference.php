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
	bottom:-1%;
	background-color:rgba(231, 231, 231,0.3);
	font-size:30px;
	}
.infor{
	position:relative;
	right:-10%;
	font-size:30px;
	text-transform:none;
	text-align:left;
	top:20%;
}
.mpart{
	heigh:auto;
	position:absolute;
	top:200%;
}
.atitle{
	font-size:40px;
	position:relative;
	top:10%;
	right:-10%;
	text-align:left;
	font-style:italic;
}
.atu{
	font-size:30px;
	text-align:left;
	position:relative;
	right:-13%;
}
.aye{
	font-size:30px;
	position:relative;
	top:10%;
	right:-13%;
	text-align:left;
}
.btt{
	font-size:60px;
	text-align:left;
	position:relative;
	top:100%;
	right:-19%;
	font-family:Georgia;
}
.res{
	position:absolute;
	width:1500px;
	top:200%;
}

</style>
</head>
<body>

<?php
$page = intval($_POST['pageNum']);
$conferid=$_POST['name'];

$con = mysql_connect("sqld-gz.bcehost.com","fefb13bf9d84473cb488a1b21251f438","b932fa0cadf84d2aab73847dc7f02dc9");
if (!$con)
  {
  die('Could not connect: '.mysql_error());
  }
mysql_query("set names 'utf8'"); 
mysql_select_db("ZBhYsGIGOzcPfpGBbAml", $con);


$sql0="select information
	   from conferences 
	   where ConferenceID='".$conferid."'";
$result0=mysql_query($sql0);
$row0=mysql_fetch_array($result0);//information
echo "<div class='infor'>".$row0["information"],"</div><br>";
echo "<div class='mpart'>";
echo "<div class='btt'>Papers Published Here</div>";

$sql2="select PaperID from papers 
       where ConferenceID ='".$conferid."'";
$result2=mysql_query($sql2);

$total = mysql_num_rows($result2);
$pageSize = 10; 
$totalPage = ceil($total/$pageSize);
$startPage = $page*$pageSize;
echo "<div class='res'>";
$sql1="select paperid, PaperPublishYear from papers where PaperID in (select PaperID from papers 
       where ConferenceID ='".$conferid."') order by PaperPublishYear desc limit $startPage,$pageSize";
$result=mysql_query($sql1);

while($row1=mysql_fetch_array($result))
{
	$sql3="select title,PaperPublishYear from papers where paperid = '".$row1["paperid"]."'";//title
	$result3=mysql_query($sql3);
	$row3=mysql_fetch_array($result3);
	$sql4="select AuthorID from paper_author_affiliation where PaperID='".$row1["paperid"]."'";//authorid
	$result4=mysql_query($sql4);
	echo "<div class='atitle'><a href='new_2.php?new1=".$row1["paperid"]."&new2=".$row3["title"]."'>".$row3["title"]."</a></div><div class='aye'>".$row3["PaperPublishYear"]."</div>";
	echo "<div class='atu'>";
	while($row4=mysql_fetch_array($result4))
	{
		$sql5="select AuthorName from authors_final where AuthorID = '".$row4["AuthorID"]."'";
		$result5=mysql_query($sql5);
		$row5=mysql_fetch_array($result5);
		echo "<a href='new_1.php?new1=".$row4["AuthorID"]."&new2=".$row5["AuthorName"]."'>".$row5["AuthorName"]."</a>";
		echo "   / /    ";
	}
	echo "</div><br><br>";
	
}
echo "<div class='pagebar'>".($page+1)."/".$totalPage."</div></div></div>"


?>

</body>
</html>