<?php
include_once("connect.php");

$q = strtolower($_GET["term"]);
$query=mysql_query("select ConferenceName,ConferenceID from conferences
		 where ConferenceName like '%".$q."%'
		 order by ConferenceID desc limit 10");

while ($row=mysql_fetch_array($query)) {
	$result[] = array(
		    'id' => $row['ConferenceID'],
		    'label' => $row['ConferenceName']
	);
}
echo json_encode($result);
?>

