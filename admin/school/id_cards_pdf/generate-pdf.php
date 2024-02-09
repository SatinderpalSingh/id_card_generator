<?php
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$content = '<h1>Hello, PDF!</h1>';

$html2pdf->writeHTML($content);
$html2pdf->output('example.pdf');

