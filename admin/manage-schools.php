<style>
.btns{
  background: #5E5DF0;
    border-radius: 999px;
    box-shadow: #5E5DF0 0 10px 20px -10px;
    box-sizing: border-box;
    color: #FFFFFF;
    cursor: pointer;
    font-family: Inter,Helvetica,"Apple Color Emoji","Segoe UI Emoji",NotoColorEmoji,"Noto Color Emoji","Segoe UI Symbol","Android Emoji",EmojiSymbols,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans",sans-serif;
    font-size: 11px;
    font-weight: 700;
    line-height: 24px;
    opacity: 1;
    outline: 0 solid transparent;
    padding: 8px 18px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: fit-content;
    word-break: break-word;
    border: 0;
}
#password_btn{
  background-color: green;
}
</style>
<div class="card card-outline card-primary" id="classes_list">
	<div class="card-header">
		<h3 class="card-title" id="heading">Manage School Users</h3>
		<div class="card-tools">
			<!--	<a href="?page=generate" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>-->
		</div>
	</div>
	<div class="card-body	">
		<div class="container-fluid">
			<div class="row row-cols-3 gx-3">
        <?php
          $qry = $conn->query("SELECT users.firstname, users.id FROM `users`; ");
          $schools_id_firstname = $qry->fetch_all(MYSQLI_ASSOC);

          echo "<table class='table table-bordered table-stripped'> <tr><th>School Name</th><th>Edit School Details</th><th>Change Password</th></tr>";

          foreach($schools_id_firstname as $school) {
            echo "
            <tr>
              <td>
                {$school['firstname']}
              </td>
              <td>
                <a href='./?page=edit-school&school={$school['id']}' >
                <button class='btns' >Edit School</button>
                </a>
              </td>
              <td>
                <a href='./?page=edit-school-password&school={$school['id']}' >
                <button class='btns'id ='password_btn' >Edit Password</button>
                </a>
              </td>
            </tr>
            ";
          }
        ?>
      </div>
		</div>
	</div>
</div>