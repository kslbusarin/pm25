<!DOCTYPE html>
<html>
<head>
	<title>Data</title>
	<meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <meta charset="utf-8">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Dust</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historyData.php">ข้อมูลย้อนหลัง</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<meta charset="UTF-8">


<?php

  $HOST_NAME = "127.0.0.1";
  $DB_NAME = "dustpm";
  $CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้
  $USERNAME = "root";     // ตั้งค่าตามการใช้งานจริง
  $PASSWORD = "";  // ตั้งค่าตามการใช้งานจริง
 
  try {  
    $db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
    $sql = "SELECT * FROM log, locate WHERE locate.lo_number = log.lo_number ";
    $query = $db->query($sql);
    echo "<table border='1' align='center' width='500'>";
    echo "<tr align='center' bgcolor='#CCCCCC'><td>Location Name</td><td>pm 1</td><td>pm 2.5</td><td>pm 10</td></tr>";
    while($row = $query->fetch()) {
  echo "<tr>";
  echo "<td>" .$row["locate_name"] .  "</td> "; 
  echo "<td>" .$row["pm01"] .  "</td> ";  
  echo "<td>" .$row["pm25"] .  "</td> ";
  echo "<td>" .$row["pm10"] .  "</td> ";
  echo "</tr>";
}
  echo "</table>";
  
  } catch (PDOException $e) {           
            echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();  
  }
?>



</body>
</html>