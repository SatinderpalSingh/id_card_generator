<style>
    .upload_data_schoolID {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
    }

    #upload_data_others {
        margin-left: 10px;
        margin-bottom: 10px;
        font-size: 18px;
    }

    #scv_button {
        /* Variables */
        --button_radius: 0.75em;
        --button_color: #e8e8e8;
        --button_outline_color: #000000;
        font-size: 15px;
        font-weight: bold;
        border: none;
        border-radius: var(--button_radius);
        background: var(--button_outline_color);
        padding: 0px;
    }

    .button_top {
        display: block;
        box-sizing: border-box;
        border: 2px solid var(--button_outline_color);
        border-radius: var(--button_radius);
        padding: 8px;
        background: var(--button_color);
        color: var(--button_outline_color);
        transform: translateY(-0.2em);
        transition: transform 0.1s ease;
    }

    #scv_button:hover .button_top {
        /* Pull the button upwards when hovered */
        transform: translateY(-0.33em);
    }

    #scv_button:active .button_top {
        /* Push the button downwards when pressed */
        transform: translateY(0);
    }
</style>
<?php

// print_r($_SESSION['userdata']);
$logged_in_school_id = $_SESSION['userdata']['id'];
/*// Database connection parameters
$host = 'localhost';
$username = 'phpmyadmin';
$password = 'password';
$database = 'id_generator';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

echo '
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Upload Student Data </h3>
		<div class="card-tools">
	
		</div>
	</div>
<br>
<div class="upload_data_schoolID">
Your School ID is : <b>' . $logged_in_school_id . '</b>
</div>
<div id="upload_data_others">

Please ensure the School ID is the same as that in the CSV file.    
<br> <br>
<a href="./template.csv">Click Here to Download CSV template</a>
<br> <br>
<form action="?page=school/upload_data" method="post" enctype="multipart/form-data">
<input type="file" name="file" accept=".csv">
<input type="hidden" value="upload_data_submit" name="upload_data_submit">

<button type="submit" name="submit" id="scv_button" >
  <span class="button_top"> Import CSV
  </span>
</button>

</form>
</div>
';

// Check if the form is submitted

if (isset($_POST['submit']) && isset($_POST['upload_data_submit'])) {
    // Check for file upload errors
    if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        die("File upload error: " . $_FILES['file']['error']);
    }

    // File upload handling
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");

    // Skip the first row (header) of the CSV file
    fgetcsv($handle, 1000, ",");

    $notInsertedRows = array();

    // Loop through the remaining rows and insert data into the database
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $admission_no = trim($data[0]);  // Assuming admission_no is the first column
        $names = trim($data[1]);
        $class = trim($data[2]);
        $date_of_birth = trim($data[3]);
        $father_name = trim($data[4]);
        $mother_name = trim($data[5]);
        $contact_no = trim($data[6]);
        $address = trim($data[7]);
        $school_id = trim($data[8]);

        // Check if admission number and class are not empty
        if (!empty($admission_no) && !empty($class) && !empty($school_id)) {
            // Check if a record with the same admission number already exists
            $check_sql = "SELECT admission_no FROM student_data WHERE admission_no = ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("s", $admission_no);
            $check_stmt->execute();
            $check_stmt->store_result();

            if ($check_stmt->num_rows > 0) {
                echo " <span style='background-color: #ffff00; color: black;'>Record with admission number $admission_no already exists.  Skipping insertion. </span><br>";
            } else {
                // Insert data into the table using prepared statement
                $insert_sql = "INSERT INTO student_data (admission_no, names, class, date_of_birth, father_name, mother_name, contact_no, address, school_id) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                // Use prepared statement to avoid SQL injection
                $insert_stmt = $conn->prepare($insert_sql);

                // Check if the prepare was successful
                if ($insert_stmt) {
                    $insert_stmt->bind_param("sssssssss", $admission_no, $names, $class, $date_of_birth, $father_name, $mother_name, $contact_no, $address, $school_id);

                    if ($insert_stmt->execute()) {
                        echo " <span style='background-color: lightgreen; color: black;'>Record inserted successfully!</span><br>";
                    } else {
                        echo "Error executing statement: " . $insert_stmt->error;
                        $notInsertedRows[] = $data; // Store the row that was not inserted
                    }

                    $insert_stmt->close();
                } else {
                    echo "Error preparing statement for insertion: " . $conn->error;
                    $notInsertedRows[] = $data; // Store the row that was not inserted
                }
            }

            $check_stmt->close();
        } else {
            echo " <span style='background-color: red; color: black;'>Admission number OR class  OR School ID is empty. Skipping insertion for row.</span><br>";
            $notInsertedRows[] = $data; // Store the row that was not inserted
        }
    }

    fclose($handle);

    echo "CSV data imported successfully!<br>";

    // Print the rows that were not inserted
    if (!empty($notInsertedRows)) {
        echo "<br> <span style='background-color: red; color: black;'>Below Rows not inserted:</span><br>";
        foreach ($notInsertedRows as $row) {
            echo implode(', ', $row) . "<br>";
        }
    }
}

// Close the database connection
$conn->close();
?>