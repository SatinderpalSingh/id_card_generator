<?php
//require __DIR__.'/vendor/autoload.php';
require '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('L', 'A4', 'en');
$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
//$html2pdf->output();
$html2pdf->output('my_doc.pdf', 'I'); 

?>
