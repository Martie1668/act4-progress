<?php  

function insertchef($pdo, $chefname, $specialization, $date_added,) {

	$sql = "INSERT INTO chef (chefname, specialization, date_added,) VALUES(?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chefname, $specialization, $date_added,]);

	if ($executeQuery) {
		return true;
	}
}
function getallchef($pdo) {
	$sql = "SELECT * FROM chef";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}
function updatechef($pdo, $chefname, $specialization, $chefid) {

	$sql = "UPDATE chef
				SET chefname = ?,
					specialization = ?,
				WHERE chefid = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chefname, $specialization, $chefid]);
	
	if ($executeQuery) {
		return true;
	}

}

function deletechef($pdo, $chefid) {
	$deletechefrecipe = "DELETE FROM recipe WHERE userID = ?";
	$deleteStmt = $pdo->prepare($deletechefrecipe);
	$executeDeleteQuery = $deleteStmt->execute([$chefid]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM chef WHERE chefid = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$chefid]);
 
		if ($executeQuery) {
			return true;
		}

	}
	
}

function getrecipebychef($pdo, $chefid) {
	
	$sql = "SELECT 
				recipe.recipeid AS recipeid,
				recipe.recipename AS recipename,
				recipe.ingredients AS ingredients,
				recipe.date_added AS date_added,
				chef.chefname AS chefname
			FROM recipe
			JOIN chef ON recipe.chefid = chef.chefid
			WHERE recipe.chefid = ? 
			GROUP BY recipe.recipename;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chefid]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}
function getrecipebyid($pdo, $recipeid) {
	$sql = "SELECT 
				recipe.recipeid AS recipeid,
				recipe.recipename AS recipename,
				recipe.ingredients AS ingredients,
				recipe.date_added AS date_added,
				chef.chefname) AS chefname
			FROM recipe
			JOIN chef ON recipe.chefid = chef.chefid
			WHERE recipe.recipeid  = ? 
			GROUP BY recipe.recipename";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$recipeid]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


?>