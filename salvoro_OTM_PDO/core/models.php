<?php  
// Insert chef

function insertchef($pdo, $chefname, $specialization) {

	$sql = "INSERT INTO chef (chefname, specialization) VALUES(?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chefname, $specialization]);

	if ($executeQuery) {
		return true;
	}
}

// get all chef
function getallchef($pdo) {
	$sql = "SELECT * FROM chef";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getchefbyid($pdo, $chefid) {
	$sql = "SELECT * FROM chef WHERE chefid = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chefid]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}




// Update chef
function updatechef($pdo, $chefname, $specialization, $chefid) {

	$sql = "UPDATE chef
				        SET chefname = ?,
					            specialization = ?
				        WHERE chefid = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chefname, $specialization, $chefid]);
	
	if ($executeQuery) {
		return true;
	}

}

// Delete chef
function deletechef($pdo, $chefid) {
	$deletechefrecipe = "DELETE FROM recipe WHERE chefid = ?";
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
				chef.chefname AS recipename
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


function insertrecipe($pdo, $recipename, $ingredients, $chefid) {
	$sql = "INSERT INTO chef (recipename, ingredients, chefid) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$recipename, $ingredients, $chefid]);
	if ($executeQuery) {
		return true;
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

function updaterecipe($pdo, $recipename, $ingredients, $recipeid) {
	$sql = "UPDATE recipe
			SET recipename = ?,
				ingredients = ?
			WHERE recipeid = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$recipename, $ingredients, $recipeid]);

	if ($executeQuery) {
		return true;
	}
}

function deleterecipe($pdo, $recipeid) {
	$sql = "DELETE FROM recipe WHERE recipeid = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$recipeid]);
	if ($executeQuery) {
		return true;
	}
}



?>
