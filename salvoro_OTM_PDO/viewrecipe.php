<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">Return to home</a>
	<?php $getallinfobychefid = getallinfobychefid($_GET['chefid']); ?>
	<h1>Chef name: <?php echo $getallinfobychefid['chefname']; ?></h1>
	<h1>Add new recipe</h1>
	<form action="core/handleforms.php?chefid=<?php echo $_GET['chefid']; ?>" method="POST">
		<p>
			<label for="recipename">Recipe Name: </label> 
			<input type="text" name="recipename">
		</p>
		<p>
			<label for="ingredients">Ingredients: </label> 
			<input type="text" name="ingredients">
			<input type="submit" name="insertnewrecipebtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Recipe ID</th>
	    <th>Recipe Name</th>
	    <th>Ingredients</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getrecipebychef = getrecipebychef($pdo, $_GET['chefid']); ?>
	  <?php foreach ($getrecipebychef as $row) { ?>
	  <tr>
	  	<td><?php echo $row['recipeid']; ?></td>	  	
	  	<td><?php echo $row['recipename']; ?></td>	  	
	  	<td><?php echo $row['ingredients']; ?></td>	  		  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editrecipe.php?recipeid=<?php echo $row['recipeid']; ?>&chefid=<?php echo $_GET['chefid']; ?>">Edit</a>
	  		<a href="deleterecipe.php?recipeid=<?php echo $row['recipeid']; ?>&chefid=<?php echo $_GET['chefid']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>
</body>
</html>