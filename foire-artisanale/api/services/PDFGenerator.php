<?php
require '../vendor/autoload.php'; // Chargement de TCPDF

class PDFGenerator {
    public static function generateArtisanList($artisans) {
        $pdf = new TCPDF();
        $pdf->SetAuthor('Foire Artisanale');
        $pdf->SetTitle('Liste des Artisans');
        $pdf->AddPage();

        // Titre du document
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Liste des Artisans', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 12);
        foreach ($artisans as $artisan) {
            $pdf->Cell(0, 8, $artisan['nom'] . ' - ' . $artisan['email'], 0, 1);
        }

        // Génération du fichier
        $pdf->Output('liste_artisans.pdf', 'D'); // Télécharge le PDF
    }
}
?>