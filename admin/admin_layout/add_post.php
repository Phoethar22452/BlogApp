<?php 
	if(isset($_POST['add_post'])){
		$post_author=$_POST['post_author'];
        $post_title=$_POST['post_title'];
        $post_category_id=$_POST['post_category_id'];

        $post_image=$_FILES['post_image']['name'];
        $post_image_tmp=$_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_tmp,'../image/'.$post_image);
        

        $post_tag=$_POST['post_tag'];
        $post_status=$_POST['post_status'];
        $post_content=$_POST['post_content'];
        $post_date=date('Y-m-d');

         $query="INSERT INTO `posts`( `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_status`, `post_view_count`) VALUES ('$post_category_id','$post_title','$post_author','$post_date','$post_image',
         '$post_content','$post_tag','0','$post_status','0')";
        $result=mysqli_query($connect,$query);
        // if(!$result){
        // 	die('failed'.mysqli_error($connect));
        // }else{
        // 	echo "success";
        // }
        header('location:post.php');
	}
 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Post Title</label>
		<input type="text" class="form-control" name="post_title">
	</div>
	<div class="form-group">
		<label for="">Post Category</label>
		<select name="post_category_id" id="" class="form-control">
			<?php 
				$query="SELECT * FROM `categories`";
				$result=mysqli_query($connect,$query);
				while($row=mysqli_fetch_assoc($result)){
					$cat_id=$row['cat_id'];
					$cat_title=$row['cat_title'];

			 ?>
			<option value="<?php echo $cat_id;?>"><?php echo $cat_title; ?></option>
			<?php 
				}
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">Post Author</label>
		<input type="text" class="form-control" name="post_author">
	</div>
	<div class="form-group">
		<label for="">Post Status</label>
		<select name="post_status" id="" class="form-control">
			<option value="hide">Hide</option>
			<option value="public">Public</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Post Image</label>
		<input type="file" name="post_image">
	</div>
	<div class="form-group">
		<label for="">Post Tags</label>
		<input type="text" class="form-control" name="post_tag">
	</div>
	<div class="form-group">
		<label for="">Post Content</label>
		<textarea name="post_content" class="form-control" id="editor" cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label for="">Post Date</label>
		<input type="date" class="form-control" name="post_date">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="add_post" value="Add Post">
	</div>
</form>
