<?php require 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP AJAX Project</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/script.js"></script>
</head>
<body>
	<div class="container">
		<h1>PHP AJAX Project</h1>

		<table class="data" align="center" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<th>S. No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>D.O.B</th>
				<th>Actions</th>
			</tr>
		</table>

		<button class="add">Add New</button><img src="assets/loader.gif" class="loader">
		<br><span class="error" id="form_error"></span>
		<div class="form" data-type="">
			<table align="center">
					<tr>
						<td>Name:</td>
						<td><input type="text" name="name" id="name"></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="email" name="email" placeholder="me@domain.com" id="email"></td>
					</tr>
					<tr>
						<td>D.O.B:</td>
						<td><input type="text" name="dob" placeholder="DD/MM/YYYY" id="dob"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="passwword" id="password"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Submit" id="submit" />&nbsp;&nbsp;<input type="reset" name="reset" value="Hide" id="hide"></td>
						
					</tr>
			</table>

		</div>
	</div>
</body>
</html>