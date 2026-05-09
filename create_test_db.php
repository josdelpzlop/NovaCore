<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3306', 'root', '12345');
    $pdo->exec('CREATE DATABASE IF NOT EXISTS novacore_testing');
    echo "DB novacore_testing created successfully.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
