<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dashboard</title>
</head>
<body>
	<form>
		<table>
			<tr>
				<th>User Profile</th>
			</tr>
			<tr>
				<td>User ID:<?php echo $this->session->userdata('UserID');?></td>
			</tr>
			<tr>
				<td>Email:<?php echo $this->session->userdata('Email');?></td>
			</tr>
			<tr>
				<td>Phone:<?php echo $this->session->userdata('Phone');?></td>
			</tr>
			<tr>
				<td>User_type:<?php echo $this->session->userdata('User_type');?></td>
			</tr>
			<tr>
				<td>Icon:<?php echo $this->session->userdata('Icon');?></td>
			</tr>
			<tr>
				<td>Last_name:<?php echo $this->session->userdata('Last_name');?></td>
			</tr>
			<tr>
				<td>First_name:<?php echo $this->session->userdata('First_name');?></td>
			</tr>
			<tr>
				<td>Age:<?php echo $this->session->userdata('Age');?></td>
			</tr>
			<tr>
				<td>WeChat_ID:<?php echo $this->session->userdata('WeChat_ID');?></td>
			</tr>
			<tr>
				<td>Registration_date:<?php echo $this->session->userdata('Registration_date');?></td>
			</tr>
			<tr>
				<td>Date_of_Birth:<?php echo $this->session->userdata('Date_of_Birth');?></td>
			</tr>
			<tr>
				<td>Gender:<?php echo $this->session->userdata('Gender');?></td>
			</tr>
		</table>
	</form>
	
</body>
</html>
