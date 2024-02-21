<?php
  // print_r($_POST);
  // exit;
  $conn = new mysqli("localhost", "id_generator", "RgjW9ytg0rAD6q2g", "id_generator");

 // $sql = "SELECT * FROM students;";
  $sql = "SELECT * FROM `student_data` WHERE `class`='".$_POST['class']."' and school_id='".$_POST['school_id']."';";
  
  $chosen_template = $_POST['chosen_template'] . ".css";
  
//echo $sql;
  $result = $conn->query($sql);
	$sql_school = "SELECT * FROM `users` where id='".$_POST['school_id']."'; ";
	$result_sc = $conn->query($sql_school);
	$row_sc = $result_sc->fetch_assoc();
  // $table = "<link rel='stylesheet' href='./`$chosen_template'/><table><tbody><tr>";
  
  $table = "<link rel='stylesheet' href='./css/$chosen_template'><table><tbody><tr>";
  $i = 0;
  foreach($result as $student_data) {
    if($i % 5 == 0 && $i != 0) $table .= "</tr><tr>";
    $table .= 

      "<td>
        <div class='first_section'>
            <img src='./Images/".$row_sc['avatar']."' alt='' srcset='' id='institute_logo'>
            <span id='institute_name'>".$row_sc['firstname']."</span>
        </div>
        <div class='second_section'>
        <img id='child-image' src='../../../../uploads/S_photos/{$student_data['photo_name']}' ><br>
          <div class='child-name'>{$student_data['names']}</div>
          <div class='child-class'>Class: {$student_data['class']}</div>
          <div class='child-details'>
            <span class='red_details space-right'>F.Name</span>: {$student_data['father_name']}<br>
            <span class='red_details'>M.Name</span>: {$student_data['mother_name']}<br>
            <span class='red_details'>Mob. No</span>: {$student_data['contact_no']}<br>
            <span class='red_details'>Adm. No</span> : {$student_data['admission_no']}<br>
            <span class='red_details space-left'>D.O.B</span> : {$student_data['date_of_birth']}<br>
            <br>
            <span class='red_details'>Address</span>: {$student_data['address']} 
          </div>
        </div>
        <div class='third_section'>
            <span>".$row_sc['address']."</span>
            <br><span>Contact No. ".$row_sc['contact']."</span>
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
//    echo $html_content;
// exit;
  $dompdf->set_option("dpi", 300);
  $dompdf->getOptions()->setChroot($_SERVER["DOCUMENT_ROOT"]); 
  $dompdf->loadHtml($html_content);
  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'landscape');
  // Render the HTML as PDF
  $dompdf->render();
  // Output the generated PDF to Browser
  // $dompdf->stream("", array("Attachment" => false));
  $dompdf->stream();
?>
