<?php
// connection to a mySQL server

$connect=mysql_connect("localhost","root","","starbucksNYC");
if (!$connection) {
  die("Not connected : " . mysql_error());
}
$data=file_get_contents("starbucks_new_york.json");
$array=json_decode($data,true);

foreach($array as $row)
{
	$sql="INSERT INTO starbucks(id, name, street, city, lat, lng) VALUES('".$row["id"]."','".$row["name"]."','".$row["street"]."','".$row["city"]."','".$row["location"]["latitude"]."','".$row["location"]["longitude"]."')";
	mysqli_query($connect, $sql);
}
