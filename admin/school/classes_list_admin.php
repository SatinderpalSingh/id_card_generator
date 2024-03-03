<style>
	.img-template {
		height: 30vh;
		background: #000000b8;
		object-fit: scale-down;
		object-position: center center;
	}

	.delete_template {
		position: relative;
		z-index: 2;
	}

	#generateButton {
		margin-bottom: 5px;
	}

	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		padding-top: 50px;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0, 0, 0);
		background-color: rgba(0, 0, 0, 0.8);
	}

	.modal-content {
		background-color: #fefefe;
		/* margin: auto; */
		padding: 10px;
		border: 1px solid #888;
		width: 80%;
		margin-left: 19%;
		margin-top: 2%;
	}


	.close {

		display: inline-block;
		color: #aaa;
		font-size: 28px;
		font-weight: bold;
		width: 30px;
		/* Set a specific width */
		text-align: center;
		/* Center the content horizontally */
	}

	.close:hover,
	.close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
	}

	h2 {
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		font-size: 40px;
	}

	#imageGallery {
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
	}

	.image-item {
		margin: 5px;
		display: flex;
		flex-direction: column;
	}

	.image-item img {
		width: 50mm;
		height: 85mm;
		border: 1px solid black;
	}

	.image-item input[type=radio] {
		margin-top: 10px;
		height: 20px;
	}

	.checkbox-item {
		margin-top: 10px;
	}

	#submitBtn {
		width: 144px;
		height: 34px;
	}
	

	#test_image img {
		height: 100px;
		width: 100px;
	}#button_flex{
		display: flex;
		gap: 5px;
	}
	@media (max-width: 478px) {
  
		#classes_list{
			width: 110vw;
		}
}
#get_classes_btn{
	margin: 10px 10px 10px 	0px;
}
</style>
<div class="card card-outline card-primary" id="classes_list">
	<div class="card-header">
		<h3 class="card-title" id="heading">Generate ID Card</h3>
		<div class="card-tools">
			<!--	<a href="?page=generate" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>-->
		</div>
	</div>
	<div class="card-body	">
		<div class="container-fluid">
			<div class="row row-cols-3 gx-3">

			<h3>Select School to get class list and print ID Card</h3>	
				<?php
						$school_id = $_POST['school_id'] ?? '1';
						
						// getting schools list 
						$qry = $conn->query("SELECT users.firstname, users.id FROM `users`; ");
						$schools_id_firstname = $qry->fetch_all(MYSQLI_ASSOC);

						echo "<select class='form-select' id='choose_school'>";
						foreach($schools_id_firstname as $school) {
							echo "<option value='{$school['id']}'>{$school['firstname']}</option>";
						}
						echo "</select>";

					?>
					<br>
					<form action="" method="POST">
						<input type="hidden" name="school_id" id="school_id" value="1">
						<button type="submit" id="get_classes_btn" class="btn btn-primary">Get Classes</button>
					</form>
					<br>
					<?php

			
				//$qry = $conn->query("SELECT * FROM `generated_id` order by `name` asc");
				$qry = $conn->query("SELECT DISTINCT `class`  FROM `student_data` WHERE `school_id` = " . $school_id . " order by class ASC; ");
				echo "<table class='table table-bordered table-stripped'> <tr><th> Class Name </th><th>Select Template</th></tr>   ";
				while ($row = $qry->fetch_assoc()) :
				?>
					<tr>
						<td><?php echo $row['class']; ?></td>
						<td>
							<!-- <button class="openModalBtn">Select Template</button> -->
							<span id="button_flex">
								
							<!-- shows js popup for template selection -->
							<!-- previous action url school/id_cards_pdf/main/template_1.php -->
								<!-- <button type="button" class="btn btn-success openModalBtn" id="submitBtn">Select Template</button> -->
								<form action="<?php echo base_url?>admin/choose_template.php" method="post">
									<input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
									<input type="hidden" name="class" value="<?php echo $row['class']; ?>">
									<input type="hidden" name="chosen_template" value="1" id="chosen_template">
									<!-- POPUP HTML CODE -->
									
									<input type="submit" class="btn btn-sm btn-primary" value="Select Template" /> <!-- Moves to templates page -->
								</form>
								
									
							</span>
							


						</td>
					</tr>
				<?php endwhile; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$('#manage-user').submit(function(e) {
		e.preventDefault();
		var _this = $(this)
		start_loader()
		$.ajax({
			url: _base_url_ + 'school/class_student_list.php',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					location.reload()
				} else {
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_loader()
				}
			}
		})
	})

	$('#choose_school').on('change', function() {
		$('#school_id').val(this.value);
	});

	

	
</script>