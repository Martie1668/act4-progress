<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewrecipe.php?chefid=<?php echo $_GET['chefid']; ?>">
	View The recipe</a>
	<h1>Edit the recipe!</h1>
	<?php $getrecipebyid = getrecipebyid($pdo, $_GET['recipeid']); ?>
	<form action="core/handleforms.php?recipeid=<?php echo $_GET['recipeid']; ?>
	&chefid=<?php echo $_GET['recipeid']; ?>" method="POST">
		<p>
			<label for="chefname">recipe Name</label> 
			<input type="text" name="recipename" 
			value="<?php echo $getrecipebyid['recipename']; ?>">
		</p>
		<p>
			<label for="chefname">ingredients</label> 
			<input type="text" name="ingredients" 
			value="<?php echo $getrecipebyid['ingredients']; ?>">
			<input type="submit" name="editrecipebtn">
		</p>
	</form>
</body>
</html>
