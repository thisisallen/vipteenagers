<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dashboard</title>
</head>
<body>
	<form>
		<table border = "3px">
			<tr>
				<th>User Profile</th>
			</tr>
			<?php foreach ($query_result->result() as $row): ?>
			<tr>
				<td>User ID:<?php echo $row->UserID; ?></td>
			</tr>
			<tr>
				<td>Email:<?php echo $row->Email; ?></td>
			</tr>
			<tr>
				<td>Phone:<?php echo $row->Phone; ?></td>
			</tr>
			<tr>
				<td>User_type:<?php echo $row->User_type; ?></td>
			</tr>
			<tr>
				<td>Icon:<?php echo $row->Icon; ?></td>
			</tr>
			<tr>
				<td>Last_name:<?php echo $row->Last_name; ?></td>
			</tr>
			<tr>
				<td>First_name:<?php echo $row->First_name; ?></td>
			</tr>
			<tr>
				<td>Age:<?php echo $row->Age; ?></td>
			</tr>
			<tr>
				<td>WeChat_ID:<?php echo $row->WeChat_ID; ?></td>
			</tr>
			<tr>
				<td>Registration_date:<?php echo $row->Registration_date; ?></td>
			</tr>
			<tr>
				<td>Date_of_Birth:<?php echo $row->Date_of_Birth; ?></td>
			</tr>
			<tr>
				<td>Gender:<?php echo $row->Gender; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</form>
	
</body>
</html>
