<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Syllabus Delete</title>
</head>
<body>

		<table>
        <?php foreach ($result as $key => $value): ?>
        <?php if ($value != []){   ?>
            <tr>
            <td><?php foreach($value as $k => $v):?>
                    <?php echo $key ?>
                    <?php echo $v ?>
                    <button type='button' onclick="window.location.href='syllabusdeletego?W=<?=$key;?>&S=<?=$v;?> '">Delete</button>
                    <?php endforeach ?>
                <br>

                </td>
            </tr>
        <?php }?>
        <?php endforeach; ?>

		</table>
	
	
</body>
</html>
