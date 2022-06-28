<?php 
	
	if(isset($connect,$_GET['edit'])){
		$edit_id=mysqli_real_escape_string($connect,$_GET['edit']);
		$query="SELECT * FROM `users` WHERE user_id=$edit_id";
		$result=mysqli_query($connect,$query);
		while($row=mysqli_fetch_assoc($result)){
			$firstname=$row['user_firstname'];
	        $lastname=$row['user_lastname'];
	        $username=$row['user_name'];
	        $user_role=$row['user_role'];
	        $userpassword=$row['user_password'];
		}
	}
	if(isset($_POST['edit_user'])){
		$firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $user_role=$_POST['user_role'];
        $userpassword=$_POST['userpassword'];

        $query="UPDATE `users` SET `user_name`='$username',`user_firstname`='$firstname',`user_lastname`='$lastname',`user_password`='$userpassword',`user_role`='$user_role' WHERE user_id=$edit_id";
        $result=mysqli_query($connect,$query);
 		if(!$result){
 			die('failed');
 		}
 		header('location:user.php');
	}
 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">User FirstName</label>
		<input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>">
	</div>
	<div class="form-group">
		<label for="">User LastName</label>
		<input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>">
	</div>
	<div class="form-group">
		<label for="">User Name</label>
		<input type="text" class="form-control" name="username" value="<?php echo $username?>">
	</div>
	<div class="form-group">
		<label for="">User Role</label>
		<select name="user_role" class="form-control">
			<option value="<?php echo $user_role?>"><?php echo $user_role; ?></option>
			<?php 
				if($user_role=='admin'){
					echo "<option value='subscriber'>Subscriber</option>";
				}else{
					echo "<option value='admin'>Admin</option>";
				}
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">User Password</label>
		<input type="password" class="form-control" name="userpassword">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
	</div>
</form>
