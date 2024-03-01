<?php
$school_id = $_GET['school'];
?>
<h3>Change Password</h3>

<div class="card card-outline card-primary">
  <div class="card-body">
    <div class="container-fluid">
      <div id="msg"></div>
      
      <form action="" id="manage-user">

      <input type="hidden" value="<?php echo $school_id; ?>" name='id'>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" value="" required autocomplete="off">
        </div>
      </form>
    </div>
  </div>
  <div class="card-footer">
    <div class="col-md-12">
      <div class="row">
        <button class="btn btn-sm btn-primary" form="manage-user">Edit Password</button>
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
			url:_base_url_+'classes/Users.php?f=edit-school-password',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){

				if(resp ==1){
					$('#msg').html('<div class="alert alert-primary">Password Successfully Updated</div>')
          end_loader()
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_loader()
				}
			}
		})
	})
</script>