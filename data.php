<?php 
error_reporting(0);
require 'connect.php';

if($_POST['getData'] == "1")
{
	$sql = "SELECT id, name, email, dob FROM data";
	$result = $conn->query($sql);

	$output = array();

	if($result->num_rows > 0)
	{
		$output["status"] = true;
		while($row = $result->fetch_assoc())
		{
			$output["data"][] = $row;
		}

		echo json_encode($output);
	}
}


?>