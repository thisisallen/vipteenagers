<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teacher List</title>
</head>
<body>
	<form>
		<table>
			<tr>
				<th colspan="2">Teacher List</th>
			</tr>
			<?php foreach ($query_result->result() as $row): ?>
				<tr>
					<td><?php echo $row->Email; ?></td>
					
				</tr>
			<?php endforeach; ?>

		</table>
	</form>
	
</body>
</html>