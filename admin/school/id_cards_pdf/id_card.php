<?php
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

// Student information (replace with actual data)
$studentName = 'Satinderpal Singh';
$studentID = '95057';
$course = 'Computer Science';
$issueDate = date('Y-m-d');

// HTML content for the ID card template
$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .id-card {
            width: 300px;
            height: 200px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 20px auto;
            padding: 10px;
            box-sizing: border-box;
        }

        .id-card img {
            width: 80px;
            height: auto;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .id-card h2 {
            font-size: 18px;
            margin: 0;
            color: #333;
        }

        .id-card p {
            font-size: 14px;
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <img src="photo.jpg" alt="Student Photo">
        <h2>$studentName</h2>
        <p>ID: $studentID</p>
        <p>Course: $course</p>
        <p>Issue Date: $issueDate</p>
    </div>
</body>
</html>
HTML;

// Generate PDF
$pdf = new Html2Pdf();
$pdf->writeHTML($html);

// Output the PDF directly to the browser or save to a file
$pdf->output('student_id_card.pdf', 'D');

