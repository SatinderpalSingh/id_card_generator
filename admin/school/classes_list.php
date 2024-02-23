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
</style>
<div class="card card-outline card-primary" id="classes_list">
	<div class="card-header">
		<h3 class="card-title" id="heading">List of Classes</h3>
		<div class="card-tools">
			<!--	<a href="?page=generate" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>-->
		</div>
	</div>
	<div class="card-body	">
		<div class="container-fluid">
			<div class="row row-cols-3 gx-3">
				<?php
				//$qry = $conn->query("SELECT * FROM `generated_id` order by `name` asc");
				$qry = $conn->query("SELECT DISTINCT `class`  FROM `student_data` WHERE `school_id` = " . $_settings->userdata('id') . " order by class ASC; ");
				echo "<table class='table table-bordered table-stripped'> <tr><th> Class Name </th><th>Action</th><th>Generate IDS Cards</th></tr>   ";
				while ($row = $qry->fetch_assoc()) :
				?>
					<tr>
						<td><?php echo $row['class']; ?></td>
						<td>
							<form action="?page=school/class_student_list" id="class_student_list" method="post">
								<input type="hidden" name="school_id" value="<?php echo $_settings->userdata('id') ?>">
								<input type="hidden" name="class" value="<?php echo $row['class']; ?>">

								<input type="submit" class="btn btn-sm btn-primary" value="View / Update Students" />
							</form>
						</td>
						<td>
							<!-- <button class="openModalBtn">Select Template</button> -->
							<span id="button_flex">

								<button type="button" class="btn btn-success openModalBtn" id="submitBtn">Select Template</button>
								<form action="school/id_cards_pdf/main/template_1.php" id="edit_student" method="post">
									<input type="hidden" name="school_id" value="<?php echo $_settings->userdata('id') ?>">
									<input type="hidden" name="class" value="<?php echo $row['class']; ?>">
									<input type="hidden" name="chosen_template" value="1" id="chosen_template">
									<!-- POPUP HTML CODE -->
									<div id="myModal" class="modal">
											<div class="modal-content">
	
											<!-- CROSS BUTTON	 -->
											<button onclick="cross(event)" class="close">&times;</button>
	
												<h2>Select The Template</h2>
												<div id="imageGallery">
													<div class="image-item ">
														<img src="school/id_cards_pdf/main/template_images/1.png" alt="template1" srcset="">
														<input type="radio" name="template" id="1">
													</div>
													<div class="image-item ">
													<img src="school/id_cards_pdf/main/template_images/3.png" alt="template1" srcset="">
														<input type="radio" name="template" id="3">
													</div>
													<div class="image-item ">
														<img src="school/id_cards_pdf/main/template_images/2.png" alt="template1" srcset="">
														<input type="radio" name="template" id="2">
													</div>
													<div class="image-item ">
													<img src="school/id_cards_pdf/main/template_images/4.png" alt="template1" srcset="">
														<input type="radio" name="template" id="4">
													</div>
													<div class="image-item ">
													<img src="school/id_cards_pdf/main/template_images/5.png" alt="template1" srcset="">
														<input type="radio" name="template" id="5">
													</div>
													<div class="image-item ">
													<img src="school/id_cards_pdf/main/template_images/7.png" alt="template1" srcset="">
														<input type="radio" name="template" id="7">
													</div>
													<div class="image-item ">
													<img src="school/id_cards_pdf/main/template_images/6.png" alt="template1" srcset="">
														<input type="radio" name="template" id="6">
													</div>
													<div class="image-item ">
													<img src="school/id_cards_pdf/main/template_images/8.png" alt="template1" srcset="">
														<input type="radio" name="template" id="8">
													</div>
													<div class="image-item ">
													<img src="school/id_cards_pdf/main/template_images/9.png" alt="template1" srcset="">
														<input type="radio" name="template" id="9">
													</div>
													<div class="image-item ">
													<img src="school/id_cards_pdf/main/template_images/10.png" alt="template1" srcset="">
														<input type="radio" name="template" id="10">
													</div>
												
												</div>
												<button onclick="selectTemplate(event)" id="submitBtn">Submit</button>
											</div>
									</div>
									<!-- <input type="submit" class="btn btn-sm btn-primary" value="Generate " /> -->
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

	document.querySelectorAll('.openModalBtn').forEach(button => {
		button.addEventListener('click', function(event) {
			event.preventDefault();
			const row = this.closest('tr');
			const rowIndex = Array.from(row.parentElement.children).indexOf(row);
			showModal(rowIndex);
		});
	});

	function showModal(rowIndex) {
		document.getElementById('myModal').style.display = "block";
		// document.getElementById('myModal').style.display = "none";
	}
	document.querySelector('.close').addEventListener('click', function() {
		document.getElementById('myModal').style.display = "none";
	});
	function cross(event){
		event.preventDefault();	
	}

	function selectTemplate(event){
		
		const formElement = document.getElementById('chosen_template');
		let chosenTemplate = document.querySelector('input[name="template"]:checked').id;
		
		formElement.value = chosenTemplate;
		// event.preventDefault();
	}
</script>