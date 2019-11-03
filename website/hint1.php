<?php
include_once("connect.php");

$q = strtolower($_GET["term"]);
$query=mysql_query("select AuthorID,AuthorName,papernum,
		 AffiliationName from authors_final
		 where AuthorName like '".$q."%'
		 order by papernum desc limit 10");

while ($row=mysql_fetch_array($query)) {
	$result[] = array(
		    'id' => $row['AuthorID'],
		    'label' => $row['AuthorName']
	);
}
echo json_encode($result);
?>

