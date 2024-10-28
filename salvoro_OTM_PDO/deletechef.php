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
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getchefbyid = getchefbyid($pdo, $_GET['chefid']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Chef Name: <?php echo $getchefbyid['chefname']; ?></h2>
		<h2>specialization: <?php echo $getchefbyid['specialization']; ?></h2>
		<h2>Date Added: <?php echo $getchefbyid['date_added']; ?></h2>

		<div class="deletebtn" style="float: right; margin-right: 10px;">
			<form action="core/handleforms.php?chefid=<?php echo $_GET['chefid']; ?>" method="POST">
				<input type="submit" name="deletechefbtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
