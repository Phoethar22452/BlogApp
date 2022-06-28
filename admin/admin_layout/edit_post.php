<?php 
	ob_start();
	if(isset($connect,$_GET['post_id'])){
		$post_id = mysqli_real_escape_string($connect,$_GET['post_id']);
		$query = "SELECT * FROM posts WHERE post_id=$post_id";
		$result = mysqli_query($connect,$query);
		//echo $post_id;
		if(!$result){
			die("failed");
		}
		while($row=mysqli_fetch_assoc($result)){
			$post_id=$row['post_id'];
			$post_author=$row['post_author'];
	        $post_title=$row['post_title'];
	        $post_category_id=$row['post_category_id'];
	        $post_image=$row['post_image'];
	        $post_tag=$row['post_tag'];
	        $post_status=$row['post_status'];
	        $post_content=$row['post_content'];
	        $post_date=date('Y-m-d');
	        $post_comment_count=$row['post_comment_count'];
	        $post_view_count=$row['post_view_count'];
		}
	}
		if(isset($_POST['update'])){
		$edit_post_author=$_POST['post_author'];
        $edit_post_title=$_POST['post_title'];
        $edit_post_category_id=$_POST['post_category_id'];
        $edit_post_content=$_POST['post_content'];
        $edit_post_image=$_FILES['post_image']['name'];
        if($edit_post_image){
        	$query="SELECT * FROM posts WHERE post_id=$post_id";
        	$result=mysqli_query($connect,$query);
        	$row=mysqli_fetch_assoc($result);
        	$old_post_image=$row['post_image'];
        	$img_path='../image/'.$old_post_image;
        	if(file_exists($img_path)){
        		unlink($img_path);
        	}
        	$edit_post_image_tmp=$_FILES['post_image']['tmp_name'];
            move_uploaded_file($post_image_tmp,'../image/'.$edit_post_image);
        }
        elseif(empty($edit_post_image)){
        	$query="SELECT * FROM posts WHERE post_id=$post_id";
        	$result=mysqli_query($connect,$query);
        	$row=mysqli_fetch_assoc($result);
        	$edit_post_image=$row['post_image'];
        }

        $edit_post_tag=$_POST['post_tag'];
        $edit_post_status=$_POST['post_status'];
        
        $edit_post_date=date('Y-m-d');

        $query="UPDATE `posts` SET `post_category_id`='$edit_post_category_id',`post_title`='$edit_post_title',`post_author`='$edit_post_author',`post_date`='$edit_post_date',`post_image`='$edit_post_image',`post_content`='$edit_post_content',`post_tag`='$edit_post_tag',`post_comment_count`=
        '$post_comment_count',`post_status`='$edit_post_status',`post_view_count`='$post_view_count' WHERE post_id=$post_id";
        mysqli_query($connect,$query);
        header('location:post.php');
	}
	
	
 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Post Title</label>
		<input type="text" class="form-control" name="post_title" value="<?php echo $post_title;?>">
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
		<input type="text" class="form-control" name="post_author" value="<?php echo $post_author?>">
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
		<img src="../image/<?php echo $post_image ?>" width="120px" height="100px" alt="">
		<input type="file" name="post_image">
	</div>
	<div class="form-group">
		<label for="">Post Tags</label>
		<input type="text" class="form-control" name="post_tag" value="<?php echo $post_tag?>">
	</div>
	<div class="form-group">
		<label for="">Post Content</label>
		<textarea name="post_content" class="form-control" id="editor" cols="30" rows="10"><?php echo $post_content ?></textarea>
	</div>
	<div class="form-group">
		<label for="">Post Date</label>
		<input type="date" class="form-control" name="post_date" value="<?php echo $post_date?>">
	</div>
	<div class="form-group">
		<input type="submit" name="update" class="btn btn-primary" value="Update Post">
	</div>
</form>
