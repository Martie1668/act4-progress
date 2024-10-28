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
    <a href="index.php">Return to home</a>
    <h1>Add new recipe</h1>
	<form action="core/handleforms.php?chefid=<?php echo $_GET['chefid']; ?>" method="POST">

    <p><label for="Recipename">Recipe Name </label> 
            <input type="text" name="recipe"> </p>
		<p>
			<label for="Ingredients">Ingredients</label> 
			<input type="text" name="Recipepri">
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
