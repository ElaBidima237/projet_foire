<?php
$config = require __DIR__ . '/../config/env.php';

// Connexion à la base de données
$dsn = "mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']};charset=utf8";
$pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

// Accéder aux autres variables
$jwt_secret = $config['JWT_SECRET'];
return [
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'foire_artisanale',
    'DB_USER' => 'root',
    'DB_PASSWORD' => 'secret',
    'JWT_SECRET' => 'your_secret_key_here'
];
?>