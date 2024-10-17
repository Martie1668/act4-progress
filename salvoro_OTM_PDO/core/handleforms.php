<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertchefbtn'])) {
	$query = insertchef($pdo, $_POST['chefname'], $_POST['specialization']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}

if (isset($_POST['editchefbtn'])) {
	$query = updatechef($pdo, $_POST['chefname'], $_POST['specialization'], $_GET['chefID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}

if (isset($_POST['deletechefbtn'])) {
	$query = deletechef($pdo, $_GET['chefid']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertnewrecipebtn'])) {
	$query = insertrecipe($pdo, $_POST['recipename'], $_POST['ingredients'], $_GET['chefid']);

	if ($query) {
		header("Location: ../viewprojects.php?chefid=" .$_GET['chefid']);
	}
	else {
		echo "Insertion failed";
	}
}



?>