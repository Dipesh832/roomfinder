<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// show which directory it's running from
echo "Running from: " . __DIR__ . "<br>";

require_once __DIR__ . '/config/config.php';

echo "✅ Config file included<br>";
echo base_url('auth/login.php');
