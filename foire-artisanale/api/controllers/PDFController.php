<?php
require '../models/Artisan.php';
require '../services/PDFGenerator.php';

$artisanModel = new Artisan();
$artisans = $artisanModel->getAll();

PDFGenerator::generateArtisanList($artisans);
?>