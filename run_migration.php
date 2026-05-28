<?php
// Function to parse .env file
function getEnvVariable($key, $default = '') {
    $val = getenv($key);
    if ($val !== false) return $val;
    
    $envPath = __DIR__ . '/.env';
    if (file_exists($envPath)) {
        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            $parts = explode('=', $line, 2);
            if (count($parts) === 2) {
                if (trim($parts[0]) === $key) {
                    return trim($parts[1]);
                }
            }
        }
    }
    return $default;
}

$db_host = getEnvVariable('DB_HOSTNAME', '127.0.0.1');
$db_user = getEnvVariable('DB_USERNAME', 'muledraws');
$db_pass = getEnvVariable('DB_PASSWORD', 'muledraws');
$db_name = getEnvVariable('DB_DATABASE', 'muledraws');

echo "Connecting to database host: $db_host ...\n";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error . "\n");
}

$sql = "ALTER TABLE setting_profile_business ADD COLUMN whatsapp VARCHAR(64) DEFAULT NULL;";
if ($mysqli->query($sql) === TRUE) {
    echo "Column 'whatsapp' added successfully!\n";
} else {
    if (strpos($mysqli->error, 'Duplicate column name') !== false) {
        echo "Column 'whatsapp' already exists in the database!\n";
    } else {
        echo "Error: " . $mysqli->error . "\n";
    }
}
$mysqli->close();
