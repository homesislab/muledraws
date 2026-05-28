<?php
$mysqli = new mysqli("localhost", "muledraws", "muledraws", "muledraws");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$sql = "ALTER TABLE setting_profile_business ADD COLUMN whatsapp VARCHAR(64) DEFAULT NULL;";
if ($mysqli->query($sql) === TRUE) {
    echo "Column whatsapp added successfully!\n";
} else {
    echo "Error: " . $mysqli->error . "\n";
}
$mysqli->close();
