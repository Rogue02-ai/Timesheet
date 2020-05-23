<?php
include 'include\db_connection.php';
$subjects = array();
$sql = "select subject_name from cis_subjects"; 
$stmt = $connection->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row)
{

		$subjects[] = $row;

	echo json_encode($subjects);
}
else
{
	echo "error";
}
?>