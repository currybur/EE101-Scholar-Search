<html>
<head>
<style type="text/css">
table,td,th{border:0px}
table{
	border-collapse:collapse;
	width:100%;
	}
td{
	font-size:40px;
	
}
th{
	color:grey;
	height:50px;
	font-size:30px;
	font-weight:50;
	}
.pagebar{
	position:absolute;
	left:15%;
	bottom:-15%;
	background-color:rgba(231, 231, 231,0.3);
	}
.bond{
	font-weight:700;
 }
 .recom{
	 
	 position:absolute;
	width:1500px;
	top:200%;
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
	font-family:none;
	font-style:italic;
}
.atu{
	font-size:30px;
	text-align:left;
	position:relative;
	right:-13%;
	font-family:none;
}
.aye{
	font-size:30px;
	position:relative;
	top:10%;
	right:-13%;
	text-align:left;
	font-family:none;
}
.btt{
	font-size:40px;
	text-align:left;
	position:relative;
	top:100%;
	right:-19%;
	font-family:Georgia;
}
.infor{
	position:relative;
	right:-10%;

	text-align:left;
	top:80%;
}

</style>
</head>
<body>
<?php
$page = intval($_POST['pageNum']);
$paperid=$_POST['name'];

$con = mysql_connect("sqld-gz.bcehost.com","fefb13bf9d84473cb488a1b21251f438","b932fa0cadf84d2aab73847dc7f02dc9");
if (!$con)
  {
  die('Could not connect: '.mysql_error());
  }
mysql_query("set names 'utf8'"); 
mysql_select_db("ZBhYsGIGOzcPfpGBbAml", $con);


$sql0="select AuthorID
	   from paper_author_affiliation 
	   where PaperID='".$paperid."'";//authorid
$result0=mysql_query($sql0);





$sql1="select refer_time from paperrefer 
       where paperid ='".$paperid."'";//refer. time
	   
$result=mysql_query($sql1);
$row1=mysql_fetch_array($result);

echo "<div class='infor'>";
echo "<table border='2' cellpadding='10'><tr>
		   <th>Reference Time</th>
		   <th>Year</th>
          <th>ConferenceName</th>
         <th>Authors from sequence 1</th></tr>";

	$sql2="select title from papers where paperid = '".$paperid."'";//title
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	
	if($row1["refer_time"]==NULL)echo "<td>0</td>";
	else echo "<td>".$row1["refer_time"]."</td>";
	
	$sql4="select conferenceid,paperpublishyear from papers where paperid = '".$paperid."'";
	$result4=mysql_query($sql4);
	$row4=mysql_fetch_array($result4);
	
	echo "<td>".$row4["paperpublishyear"]."</d>";
	$sql3="select conferencename from conferences where conferenceid = '".$row4["conferenceid"]."'";//conferencename
	$result3=mysql_query($sql3);
	$row3=mysql_fetch_array($result3);
	
	echo "<td>";
	echo "<a href='new_3.php?new1=".$row4["conferenceid"]."&new2=".$row3["conferencename"]."'>".$row3["conferencename"]."</a>";
	echo "</td>";
	
	echo "<td>";
	while($row0=mysql_fetch_array($result0)){
		$sql5="select AuthorName from authors_final where AuthorID = '".$row0["AuthorID"]."'";
		$result5=mysql_query($sql5);
		$row5=mysql_fetch_array($result5);
		echo "<a href='new_1.php?new1=".$row0["AuthorID"]."&new2=".$row5["AuthorName"]."'>".$row5["AuthorName"]."</a>";
		echo " & ";
	}
	echo "</td></tr>";
	

echo "</table>";
echo "</div>";
//-------------------
echo "<div class='mpart'>";
echo "<div class='btt'>Refered Papers</div>";
echo "<div class='recom'>";
$sql6="select paperid from paper_reference where ReferenceID='".$paperid."'";
$result6=mysql_query($sql6);
$total = mysql_num_rows($result6);
$pageSize = 10; 
$totalPage = ceil($total/$pageSize);
$startPage = $page*$pageSize;
$sql7="select paperid,refer_time from paperrefer where paperid in (select paperid from paper_reference where ReferenceID='".$paperid."') order by refer_time desc limit $startPage,$pageSize";
$result7=mysql_query($sql7);
if($result7){
while($row7=mysql_fetch_array($result7))
{
	$sql8="select title,PaperPublishYear from papers where paperid = '".$row7["paperid"]."'";
	$result8=mysql_query($sql8);
	$row8=mysql_fetch_array($result8);
	$sql9="select AuthorID from paper_author_affiliation where PaperID='".$row7["paperid"]."'";
	$result9=mysql_query($sql9);
	echo "<div class='atitle'><a href='new_2.php?new1=".$row7["paperid"]."&new2=".$row8["title"]."'>".$row8["title"]."</a></div><div class='aye'>".$row8["PaperPublishYear"]."</div>";
	echo "<div class='atu'>";
	while($row9=mysql_fetch_array($result9))
	{
		$sql10="select AuthorName from authors_final where AuthorID = '".$row9["AuthorID"]."'";
		$result10=mysql_query($sql10);
		$row10=mysql_fetch_array($result10);
		echo "<a href='new_1.php?new1=".$row9["AuthorID"]."&new2=".$row10["AuthorName"]."'>".$row10["AuthorName"]."</a>";
		echo "   &   ";
	}
	echo "</div><br><br>";
	
}
echo "</br></div></div>";
}
else echo "No reference!";
?>

</body>
</html>