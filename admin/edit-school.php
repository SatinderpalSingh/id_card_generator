<?php
$school_id = $_GET['school'];

$sql = "SELECT firstname, username, password FROM users WHERE id='$school_id';";

$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
<h3>Change School</h3>

<div class="card card-outline card-primary">
  <div class="card-body">
    <div class="container-fluid">
      <div id="msg"></div>

      <form action="" id="manage-user">

        <input type="hidden" value="<?php echo $school_id; ?>" name='id'>
        <div class="form-group">
          <label for="name">School Name</label>
          <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $data['firstname']; ?>" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $data['username']; ?>" required autocomplete="off">
        </div>
      </form>
    </div>
  </div>
  <div class="card-footer">
    <div class="col-md-12">
      <div class="row">
        <button class="btn btn-sm btn-primary" form="manage-user">Update</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#manage-user').submit(function(e){
		e.preventDefault();
var _this = $(this)
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Users.php?f=edit-school',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp ==1){
          $('#msg').html('<div class="alert alert-primary">Details Successfully Updated</div>')
          end_loader()
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_loader()
				}
			}
		})
	})
</script>