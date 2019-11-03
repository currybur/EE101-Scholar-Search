<?php
include_once("connect.php");

$q = strtolower($_GET["term"]);
$query=mysql_query("select title,PaperPublishYear from papers
		 where title like '%".$q."%'
		 order by PaperPublishYear desc limit 10");

while ($row=mysql_fetch_array($query)) {
	$result[] = array(
		    'id' => $row['PaperPublishYear'],
		    'label' => $row['title']
	);
}
echo json_encode($result);
?>

