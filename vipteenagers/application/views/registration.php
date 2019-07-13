<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
</head>
<body>
	<form action="registrationgo" method="POST">
		<table>
			<tr>
				<th colspan="2">Registration Form</th>
			</tr>
			<tr>				
				<td>email</td>
				<td>Password</td>
			</tr>
			<tr>
				<td><input type="text" name="email" ></td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				
				<td>Phone</td>
				<td>Gender</td>
			</tr>
			<tr>
				
				<td><input type="text" name="phone"></td>
				<td><input type="text" name="gender" ></td>
			</tr>
			<tr>
				<td>User Type</td>
				<td>Icon</td>
			</tr>
			<tr>
				<td>
					<select name="user_type">
						<option value="Student">Student</option>
						<option value="Teacher">Teacher</option>
					    <option value="Advisor">Advisor</option>
					</select>
				</td>
				<td><input type="text" name="icon"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>First Name</td>
			</tr>
			<tr>
				<td><input type="text" name="last_name" ></td>
				<td><input type="text" name="first_name"></td>
			</tr>
			<tr>
				<td>Age</td>
				<td>WeChat ID</td>
			</tr>
			<tr>
				<td><input type="text" name="age" ></td>
				<td><input type="text" name="weChat_ID"></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
			</tr>
			<tr>
				<td><input type="text" name="date_of_Birth"></td>
			</tr>
	
			<tr>
			<td colspan="2" >	<input type="submit" name="sbumit" value="Submit"></td>
		</tr>
		</table>
	</form>
	
</body>
</html>
