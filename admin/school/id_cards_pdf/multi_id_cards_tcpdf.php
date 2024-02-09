<?php
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

// A4 page dimensions in millimeters
$pageWidth = 210;
$pageHeight = 297;

// Student data (replace with actual class data)
$students = [
    ['name' => 'Satinderpal Singh', 'id' => '123456', 'course' => 'Computer Science', 'issueDate' => '2023-12-10'],
    // Add more students here...
];

// HTML template for a single ID card
$idCardTemplate = <<<HTML
<div class="id-card">
    <h2>%s</h2>
    <p>ID: %s</p>
    <p>Course: %s</p>
    <p>Issue Date: %s</p>
</div>
HTML;

// Generate HTML for all students
$html = '';
foreach ($students as $student) {
    $html .= sprintf($idCardTemplate, $student['name'], $student['id'], $student['course'], $student['issueDate']);
}

// Create a PDF with multiple ID cards on a single page
$pdf = new Html2Pdf(['orientation' => 'L', 'format' => [$pageWidth, $pageHeight]]);
$pdf->setDefaultFont('Arial');
$pdf->writeHTML($html);

// Output the PDF directly to the browser or save to a file
$pdf->output('class_id_cards.pdf', 'D');

