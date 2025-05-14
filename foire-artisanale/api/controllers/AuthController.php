<?php
require '../config/env.php';
require '../models/User.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController {
    private $secretKey;
    private $userModel;

    public function __construct() {
        $config = require '../config/env.php';
        $this->secretKey = $config['JWT_SECRET'];
        $this->userModel = new User();
    }

    // 🔐 Connexion et génération du token
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $token = $this->generateToken($user);
                echo json_encode(["token" => $token]);
            } else {
                http_response_code(401);
                echo json_encode(["error" => "Email ou mot de passe incorrect"]);
            }
        }
    }

    // 🔑 Génération du JWT
    private function generateToken($user) {
        $payload = [
            'iss' => 'foire-artisanale',
            'sub' => $user['id'],
            'iat' => time(),
            'exp' => time() + 3600  // Expiration dans 1 heure
        ];

        return JWT::encode($payload, $this->secretKey, 'HS256');
    }
}
?>