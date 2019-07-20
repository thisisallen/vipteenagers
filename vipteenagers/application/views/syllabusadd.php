<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
</head>
<body>
	<form action="syllabusaddgo" method="POST">
		<table>
			<tr>
				<th colspan="2">Syllabus</th>
			</tr>
			<tr>
				<td>Weekday</td>
				<td>Start time</td>
			</tr>
			<tr>
				<td>
                    <select name= "oneW">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>

                </td>
                <td>
                    <select name = "oneS">
                        <option value="7">7：00</option>
                        <option value="8">8：00</option>
                        <option value="9">9：00</option>
                        <option value="10">10：00</option>
                        <option value="11">11：00</option>
                        <option value="12">12：00</option>
                        <option value="13">13：00</option>
                        <option value="14">14：00</option>
                        <option value="15">15：00</option>
                        <option value="16">16：00</option>
                        <option value="17">17：00</option>
                        <option value="18">18：00</option>
                        <option value="19">19：00</option>
                        <option value="20">20：00</option>
                        <option value="21">21：00</option>
                        <option value="22">22：00</option>
                    </select>
                </td>
			</tr>


        <tr>
			<td colspan="2" >	<input type="submit" name="sbumit" value="Submit"></td>
		</tr>
		</table>
	</form>
	
</body>
</html>
