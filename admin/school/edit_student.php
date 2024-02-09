<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Data</title>
</head>
<body>

    <h2>Edit Student Data</h2>

    <?php
    // Assuming $conn is your database connection

    // Fetch the data for a specific student based on the admission number
    $admissionNoToEdit = $_POST['student_id'];
    $result = $conn->query("SELECT * FROM `student_data` WHERE `id` = '$admissionNoToEdit'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?><table class='table table-bordered table-stripped'>
        <form action="?page=school/class_student_list" method="post">
            <input type="hidden" name="student_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="update_student_data" value="update_student_data">
            <input type="hidden" name="school_id" value="<?php echo $_POST['school_id'] ?>">
				<input type="hidden" name="class" value="<?php echo $_POST['class'] ?>">
				

         <tr><td>   <label for="names">Names:</label></td><td>
            <input type="text" id="names" name="names" value="<?php echo $row['names']; ?>" required>
            <br></td></tr>

           <tr><td>    <label for="class">Class:</label></td><td>
            <input type="text" id="class" name="class" value="<?php echo $row['class']; ?>" readonly>
            <br></td></tr>

         <tr><td>      <label for="date_of_birth">Date of Birth:</label></td><td>
            <input type="text" id="date_of_birth" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" required>
            <br></td></tr>

            <tr><td>   <label for="father_name">Father's Name:</label></td><td>
            <input type="text" id="father_name" name="father_name" value="<?php echo $row['father_name']; ?>" required>
            <br></td></tr>

             <tr><td>  <label for="mother_name">Mother's Name:</label></td><td>
            <input type="text" id="mother_name" name="mother_name" value="<?php echo $row['mother_name']; ?>" required>
            <br></td></tr>

           <tr><td>    <label for="contact_no">Contact No:</label></td><td>
            <input type="text" id="contact_no" name="contact_no" value="<?php echo $row['contact_no']; ?>" required>
            <br></td></tr>

            <tr><td>   <label for="address">Address:</label></td><td>
            <textarea id="address" name="address"><?php echo $row['address']; ?></textarea>
            <br></td></tr>

            <tr><td colspan='2'><center> <input type="submit" class="btn btn-sm btn-primary"  value="Update " /> </center></td></tr>
        </form>
        </table>
    <?php
    } else {
        echo "Error: Student not found.";
    }

    // Close the result set
    $result->close();

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
