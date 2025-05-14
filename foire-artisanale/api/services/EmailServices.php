<?php

class EmailService {
    public function sendEmail($to, $subject, $message) {
        mail($to, $subject, $message);
    }
}