<?php 
error_reporting(0);
require 'connect.php';
function isDate($date)
{
	
	$date = explode("/", $date);
	
	if(checkdate($date[1], $date[0], $date[2]))
		return true;

	return false;
}
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
}else if($_POST["new"] == "1")
{
	$name = htmlspecialchars($_POST["name"]);
	$email = htmlspecialchars($_POST["email"]);
	$dob = $_POST["dob"];
	$password = sha1($_POST["password"]);

	$output = array();

	$validation = true;

	if(strlen($name) > 25)
	{
		$output["status"] = false;
		$output["error"][] = "Name cannot be more than 25 characters";
		$validation = false;
	}
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$output["status"] = false;
		$output["error"][] = "Invalid Email entered";
		$validation = false;
	}
	
	 if(!isDate($dob))
	{
		$output["status"] = false;
		$output["error"][] = "Invalid DOB Entered";
		$validation = false;
	}

	if($validation)
	{
		$sql = "INSERT INTO data (name, email, dob, password) VALUES('$name', '$email', '$dob', '$password')";

		if($conn->query($sql))
		{
			$output["status"] = true;
		}
		else
		{
			$output["status"] = false;
			$output["error"] = $conn->error;
		}

		echo json_encode($output);
	}
	else
	{
		echo json_encode($output);
	}
}


?>