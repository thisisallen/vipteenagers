<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
</head>
<body>
	<form action="messagego" method="POST">
		<table>
			<tr>
				<th colspan="2">Login Form</th>
			</tr>
			<tr>
                <td>To:</td>
			</tr>
			<tr>
				<td><input type="text" name="receiverID" ></td>
			</tr>

            <tr>
                <td>Subject:</td>
            </tr>
            <tr>
                <td><input type="text" name="subject" ></td>
            </tr>

            <tr>
                <td>Content:</td>
            </tr>
            <tr>
                <td><textarea  cols="2" rows="10" type="text" name="content"></textarea></td>
            </tr>
            <?php
                $email = "alanshi1110@gmail.com";
                echo "<a href = 'http://localhost/vipteenagers/index.php/api_v1/auth/resetpass?email={$email}'>";
                echo "hello.";
            ?>
        <tr>
			<td colspan="2" >	<input type="submit" name="sbumit" value="Submit"></td>
		</tr>
		</table>
	</form>
	
</body>
</html>
