<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Form</title>
</head>
<body>
	<form action="updatego" method="POST">
		<table border="5px">
			<tr>
				<th colspan="2">Update Form</th>
			</tr>
			<?php foreach ($query_result->result() as $row): ?>
			<tr>
				<td>Email</td>
				<td>Gender</td>
			</tr>
			<tr>
				<td><?php echo $row->Email; ?></td> 
				<td>
					<select name="gender">
						<option value="Female" <?php echo $row->Gender == 'Female' ? 'selected="selected"':null ?> >Female</option>
						<option value="Male" <?php echo $row->Gender == 'Male' ? 'selected="selected"':null ?>>Male</option>
						<option value="Other" <?php echo $row->Gender == 'Other' ? 'selected="selected"':null ?>>Other</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Icon</td>
				<td>Phone</td>
			</tr>
			<tr>
				<td><input type="text" name="icon" value="<?php echo $row->Icon; ?>"></td>
				<td><input type="text" name="phone" value="<?php echo $row->Phone; ?>"></td>
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
				<td>Date of Birth</td>
			</tr>
			<tr>
				<td><input type="date" name="date_of_Birth" value="<?php echo $row->Date_of_Birth; ?>"></td>
			</tr>
		<?php endforeach ?>
			
			<tr align = "center">
				<td colspan="2" ><input type="submit" name="sbumit" value="Submit"></td>
			</tr>
		</table>
		<input style="display: none;" type="text" name="password" value="<?php echo $row->Password; ?>" />
		<input style="display: none;" type="text" name="registration_date" value="<?php echo $row->Registration_date; ?>" />
		<input style="display: none;" type="text" name="email" value="<?php echo $row->Email; ?>" />
	</form>
	
</body>
</html>
