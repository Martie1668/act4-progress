
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
	<h1>Welcome to our menu. </h1>
	<form action="core/handleforms.php" method="POST">
		<p>
			<label for="chefname">Chef name: </label> 
			<input type="text" name="chefname">
		</p>
		<p>
			<label for="specialization">Specialization: </label> 
			<input type="text" name="specialization">
            <input type="submit" name="insertchefbtn">
		</p>


	</form>
	<?php $getallchef = getallchef($pdo); ?>
	<?php foreach ($getallchef as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 180px; margin-top: 20px;">
		<h3>Chef Name: <?php echo $row['chefname']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>
        <h3>Date Added: <?php echo $row['date_added']; ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewrecipe.php?chefid=<?php echo $row['chefid']; ?>">View recipe</a>
			<a href="editchef.php?chefid=<?php echo $row['chefid']; ?>">Edit</a>
			<a href="deletechef.php?chefid=<?php echo $row['chefid']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>
