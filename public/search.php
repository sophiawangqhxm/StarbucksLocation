<?php
require("../dataset/database_conncet.php");
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("starbucks");
$parnode = $dom->appendChild($node);

// Opens a connection to a mySQL server
$connect=mysql_connect ("localhost", "root","");
if (!$connect) {
  die("Not connected : " . mysql_error());
};

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connect);
if (!$db_selected) {
  die ("Can't use db : " . mysql_error());
};

//show rows in the starbucks table
$query = "SELECT name, street,city, lat, lng, ( 3959 * acos( cos( radians('40') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('-73') ) * sin( radians( lat ) ) ) ) AS distance FROM starbucks  ORDER BY distance".
  

$result = mysql_query($query);
if (!$result) {
  die("Invalid query: " . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("street", $row['street']);
  $newnode->setAttribute("city", $row['city']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("distance", $row['distance']);
}

echo $dom->saveXML();
?>





