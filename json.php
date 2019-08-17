<?php
	header('Content-Type: application/json');
	$objConnect = new mysqli("127.0.0.1","root","","dustpm");
	mysqli_set_charset($objConnect, "utf8");
	
	$strSQL = "SELECT * FROM locate, log WHERE locate.lo_number = log.lo_number ";
	$query = mysqli_query($objConnect, $strSQL);
	

	$resultArray = array();
	while($obResult = mysqli_fetch_array($query))
	{
		array_push($resultArray,$obResult);
	}
	
	$objConnect->close();
	
	echo json_encode($resultArray);
?>

