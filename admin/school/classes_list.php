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
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 40%;
		height: 40%;
	}

	.close {
		color: #aaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
	}

	#imageGallery {
		display: flex;
		flex-wrap: wrap;
	}

	.image-item {
		margin: 5px;
	}

	.image-item img {
		width: 100px;
		height: 100px;
	}

	.checkbox-item {
		margin-top: 10px;
	}
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Classes</h3>
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
				echo "<table class='table table-bordered table-stripped'> <tr><th> Class Name </th><th>Action</th><th>Generate I Cards</th></tr>   ";
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
							<form action="school/id_cards_pdf/main/template_1.php" id="edit_student" method="post">
								<input type="hidden" name="school_id" value="<?php echo $_settings->userdata('id') ?>">
								<input type="hidden" name="class" value="<?php echo $row['class']; ?>">

								<button class="openModalBtn">Select Template</button>
								<div id="myModal" class="modal">
									<div class="modal-content">
										<span class="close">&times;</span>
										<h2>Image Gallery</h2>
										<div id="imageGallery">
											<div class="image-item ">

												<img src="./Images/college_logo.png" alt="" srcset="">
											</div>
										</div>
										<button id="submitBtn">Submit</button>
									</div>
								</div>

								<input type="submit" class="btn btn-sm btn-primary" value="Generate " />
							</form>
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
}
</script>