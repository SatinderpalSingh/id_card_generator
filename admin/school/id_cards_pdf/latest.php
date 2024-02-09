<?php
  require __DIR__.'/vendor/autoload.php';

  use Spipu\Html2Pdf\Html2Pdf;
  
  // path to html template
  $html_content = file_get_contents("latest.html");

  // $html_content = shell_exec('php template.html');
  $html2pdf = new Html2Pdf('L', 'A4','en');
  $html2pdf->writeHTML($html_content);
  
  // $html2pdf->output('D:\Code\xampp\htdocs\_minor-project\html_to_pdf\abc.pdf', 'F');
  $html2pdf->output();

?>