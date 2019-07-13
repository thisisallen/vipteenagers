<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Form</title>
</head>
<body>
	<form action="updatego" method="POST">
		<table>
			<tr>
				<th colspan="2">Update Form</th>
			</tr>
			<?php foreach ($query_result->result() as $row): ?>
			<tr>
				<td>Email</td>
				<td>Gender</td>
			</tr>
			<tr>
				<td><input type="text" name="email" value="<?php echo $row->Email; ?>"></td>
				<td><input type="text" name="gender" value="<?php echo $row->Gender; ?>" ></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>Phone</td>
			</tr>
			<tr>
				<td><input type="text" name="password" value="<?php echo $row->Password; ?>"></td>
				<td><input type="text" name="phone" value="<?php echo $row->Phone; ?>"></td>
			</tr>
			<tr>
				<td>Icon</td>
			</tr>
			<tr>
				<td><input type="text" name="icon" value="<?php echo $row->Icon; ?>"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>First Name</td>
			</tr>
			<tr>
				<td><input type="text" name="last_name" value="<?php echo $row->Last_name; ?>"></td>
				<td><input type="text" name="first_name" value="<?php echo $row->First_name; ?>"></td>
			</tr>
			<tr>
				<td>Age</td>
				<td>WeChat ID</td>
			</tr>
			<tr>
				<td><input type="text" name="age" value="<?php echo $row->Age; ?>"></td>
				<td><input type="text" name="weChat_ID" value="<?php echo $row->WeChat_ID; ?>"></td>
			</tr>
			<tr>
				<td>Registration Date</td>
				<td>Date of Birth</td>
			</tr>
			<tr>
				<td><input type="text" name="registration_date" value="<?php echo $row->Registration_date; ?>" ></td>
				<td><input type="text" name="date_of_Birth" value="<?php echo $row->Date_of_Birth; ?>"></td>
			</tr>
		<?php endforeach ?>
			
			<tr>
			<td colspan="2" >	<input type="submit" name="sbumit" value="Submit"></td>
		</tr>
		</table>
	</form>
	
</body>
</html>
