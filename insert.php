<?php
require_once('Database.php');
$db = new Database('dustpm','root','','localhost'); // เชื่อมต่อฐานข้อมูล
$sql = $db->insert('locate',$_POST); // สั่ง Insert ข้อมูล users คือชื่อ Table ส่วน $_POST คือข้อมูลที่ส่งมาจากฟอร์มทั้งหมด
header("location:index.php");
?>