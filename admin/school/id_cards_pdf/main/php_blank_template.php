<?php

  $conn = new mysqli("localhost", "phpmyadmin", "password", "id_generator");

 // $sql = "SELECT * FROM students;";
  $sql = "SELECT * FROM `student_data` WHERE `class` LIKE '5TH LOTUS';";
  $result = $conn->query($sql);

  $table = "<link rel='stylesheet' href='./css_blank_template.css'/><table><tbody><tr>";
  $i = 0;
  foreach($result as $student_data) {
    if($i % 5 == 0 && $i != 0) $table .= "</tr><tr>";
    $table .= 

      "<td>
        <div class='first_section'>
            <img src='./Images/college_logo.png' alt='' srcset='' id='institute_logo'>
            <span id='institute_name'>GURU NANAK DEV ENGINEERING COLLEGE</span>
        </div>
        <div class='second_section'>
        <img id='child-image' src='./Images/stud.webp' ><br>
          <div class='child-name'>{$student_data['names']}</div>
          <div class='child-class'>Class: {$student_data['class']}</div>
          <div class='child-details'>
            <span class='red_details space-right'>F.Name</span>: {$student_data['father_name']}<br>
            <span class='red_details'>M.Name</span>: {$student_data['mother_name']}<br>
            <span class='red_details'>Mob. No</span>: {$student_data['contact_no']}<br>
            <span class='red_details'>Adm. No</span> : {$student_data['admission_no']}<br>
            <span class='red_details space-left'>D.O.B</span> : {$student_data['date_of_birth']}<br>
            <span class='red_details'>Address</span>: {$student_data['address']}<br>
          </div>
        </div>
        <div class='third_section'>
            <span>Gill Park, Gill Road, Ludhiana 141006,</span>
            <br><span>Contact No. 0161 5064501,</span>
          </div>
      </td>";
      
    $i++;
  } 

  $table .= "</tr></tbody></table>";

  // require_once 'dompdf/autoload.inc.php';
  require 'vendor/autoload.php';
  // reference the Dompdf namespace
  use Dompdf\Dompdf;
  // instantiate and use the dompdf class
  $dompdf = new Dompdf();

  $html_content = $table;
  // echo $html_content;

  $dompdf->set_option("dpi", 1000);
  $dompdf->getOptions()->setChroot($_SERVER["DOCUMENT_ROOT"]); 
  $dompdf->loadHtml($html_content);
  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'landscape');
  // Render the HTML as PDF
  $dompdf->render();
  // Output the generated PDF to Browser
  $dompdf->stream();
?>
