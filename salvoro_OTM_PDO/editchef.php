
<?php require_once 'core/handleforms.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getchefbyid = getchefbyid($pdo, $_GET['chefid']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleforms.php?chefid=<?php echo $_GET['chefid']; ?>" method="POST">


		<p>
			<label for="chefname">Chef Name: </label> 
			<input type="text" name="chefname" value="<?php echo $getchefbyid['chefname']; ?>">
		</p>


        
		<p>
			<label for="specialization">specialization: </label> 
			<input type="text" name="specialization" value="<?php echo $getchefbyid['specialization']; ?>">
            <input type="submit" name="editchefbtn">
		</p>
	</form>


</body>
</html>
