<?php 
	//Created by Juan Guzmán - Fluxer CEO

    require '../class/ConnectionClass.php';
    // Session start
    session_start();
    // Database Class initialization
	$db = new Connection();
	// Database Server Connection
	$conn = $db -> connect();
	// Database Selection
	$sel = $db -> select_db($conn,'fluxer');
	// Query
	$sql = "SELECT * FROM ".$_SESSION['username']."posts";
	// Execute Query
	$query = mysqli_query($conn,$sql);
	//Query exception
	if (!$query) {
		die('ERROR: '.mysqli_error($conn));
		return;
	}
	// Fetch Response
	$posts_array = array();
	while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
		 	array_push($posts_array, $row);
		 }
	echo json_encode($posts_array);

 ?>