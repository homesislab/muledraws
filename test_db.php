<?php
$mysqli = new mysqli("mariadb_server", "muledraws", "muledraws", "muledraws");
if ($mysqli->connect_error) { die("Connection failed: " . $mysqli->connect_error); }
$result = $mysqli->query("SELECT master_carousels.*, '' AS name FROM master_carousels GROUP BY master_carousels.id ORDER BY name ASC LIMIT 10");
if ($result) { echo "Success\n"; } else { echo "Error: " . $mysqli->error . "\n"; }
