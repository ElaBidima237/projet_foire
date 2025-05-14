<?php
require '../config/env.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware {
    public static function check() {
        $headers = getallheaders();
        $token = $headers['Authorization'] ?? '';

        if (!$token) {
            http_response_code(401);
            echo json_encode(["error" => "Accès non autorisé"]);
            exit;
        }

        try {
            $config = require '../config/env.php';
            $decoded = JWT::decode($token, new Key($config['JWT_SECRET'], 'HS256'));
            return $decoded; // Le token est valide
        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode(["error" => "Token invalide"]);
            exit;
        }
    }
}