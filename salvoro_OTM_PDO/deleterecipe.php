<?php require_once 'core/dbConfig.php'; ?>
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
	<?php $getrecipebyid = getrecipebyid($pdo, $_GET['recipeid']); ?>
	<h1>Are you sure you want to delete this recipe?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Recipe Name: <?php echo $getrecipebyid['recipename'] ?></h2>
		<h2>Ingredients: <?php echo $getrecipebyid['ingredients'] ?></h2>
		<h2>Chef ID: <?php echo $getrecipebyid['chefid'] ?></h2>
		<h2>Date Added: <?php echo $getrecipebyid['date_added'] ?></h2>

		<div class="deletebtn" style="float: right; margin-right: 10px;">

			<form action="core/handleforms.php?recipeid=<?php echo $_GET['recipeid']; ?>&chefid=<?php echo $_GET['recipeid']; ?>" method="POST">
				<input type="submit" name="deleterecipebtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>
