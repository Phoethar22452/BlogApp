<?php 
    if(isset($_POST['checkBoxArray'])){
        //echo "hello Check Box lesson";
        foreach($_POST['checkBoxArray'] as $data){ // foreach loopin kyaung 2 khu lone ta khar htel select pay ma ya mal
            //echo $data;
            $option_value=$_POST['option_value'];
            //echo $option_value;
            switch ($option_value) {
                case 'public':
                    $query="UPDATE `posts` SET `post_status`='$option_value' WHERE post_id=$data";
                    mysqli_query($connect,$query);
                    
                    break;
                case 'hide':
                    $query="UPDATE `posts` SET `post_status`='$option_value' WHERE post_id=$data";
                    mysqli_query($connect,$query);
                    
                    break;
                case 'clone':
                    $query="SELECT * FROM posts WHERE post_id=$data";
                    $result=mysqli_query($connect,$query);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $post_id=$row['post_id'];
                        $post_author=$row['post_author'];
                        $post_title=$row['post_title'];
                        $post_category_id=$row['post_category_id'];
                        $post_image=$row['post_image'];
                        $post_tag=$row['post_tag'];
                        $post_status=$row['post_status'];
                        $post_view_count=$row['post_view_count'];
                        $post_comment_count=$row['post_comment_count'];
                        $post_content=$row['post_content'];
                        $post_date=$row['post_date'];
                        $post_view_count=$row['post_view_count'];
                    }
                        $query="INSERT INTO `posts`( `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_status`, `post_view_count`) VALUES (
                        '$post_category_id','$post_title','$post_author','$post_date','$post_image','$post_content','$post_tag','$post_comment_count','$post_status',
                        '$post_view_count')";
                        $result=mysqli_query($connect,$query);
                        if(!$result){
                            die('failed');
                        }
                           break;      
                case 'delete':
                    $query="SELECT * FROM `posts` WHERE post_id=$data";
                    $result=mysqli_query($connect,$query);
                    $row=mysqli_fetch_assoc($result);
                    $post_image=$row['post_image'];
                    $img_path='../image/'.$post_image;
                    if(file_exists($img_path)){
                        unlink($img_path);
                    }
                    $query="DELETE FROM `posts` WHERE post_id=$data";
                    mysqli_query($connect,$query);
                     break; 
                default:
                    # code...
                    break;
            }
        }
    }
 ?>                
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="col-md-4" >
                                <select name="option_value" id="" class="form-control">
                                    <option value="">--Select Option--</option>
                                    <option value="public">Public</option>
                                    <option value="hide">Hide</option>
                                    <option value="delete">Delete</option>
                                    <option value="clone">Clone</option>
                                </select>           
                            </div>
                            <div class="col-md-2 form-group">
                                <input type="submit" name="apply" value="Apply" class="btn btn-primary">
                            </div>
                            <table class="table table-responsive table-hover table-bordered">
                                <tr>
                                    <th><input type="checkbox" id="select_all"></th>
                                    <th>No:</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Status</th>
                                    <th>Comments</th>
                                    <th>Views</th>
                                    <th>Date</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                <?php 
                                    $no=1;
                                    $query="SELECT * FROM `posts`";
                                    $result=mysqli_query($connect,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $post_id=$row['post_id'];
                                        $post_author=$row['post_author'];
                                        $post_title=$row['post_title'];
                                        $post_category_id=$row['post_category_id'];
                                        $post_image=$row['post_image'];
                                        $post_tag=$row['post_tag'];
                                        $post_status=$row['post_status'];
                                        $post_view_count=$row['post_view_count'];
                                        $post_comment_count=$row['post_comment_count'];
                                        $post_date=$row['post_date'];
                                    
                                 ?>
                                <tr>   
                                    <td><input type="checkbox" name="checkBoxArray[]" class="multi_check" value="<?php echo $post_id ?>"></td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $post_author ?></td>
                                    <td><?php echo $post_title ?></td>
                                    <?php 
                                        $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
                                        $cat_result=mysqli_query($connect,$query);
                                        while($row=mysqli_fetch_assoc($cat_result)){
                                            $cat_title=$row['cat_title'];
                                            echo "<td>$cat_title</td>";
                                        }
                                     ?>

                                    <td><img src="../image/<?php echo $post_image ?>" alt="" width="120px" height="100px"></td>
                                    <td><?php echo $post_tag ?></td>
                                    <td><?php echo $post_status ?></td>
                                    <td><?php echo $post_comment_count ?></td>
                                    <td><?php echo $post_view_count ?></td>
                                    <td><?php echo $post_date?></td>
                                    <td><a href="post.php?source=edit_post&post_id=<?php echo $post_id ?>" class="btn btn-warning">Update</a></td>
                                    <td><a href="post.php?delete_id=<?php echo $post_id ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php 
                                    }
                                 ?>
                            </table>
                        </form>
                    </div>

                    <?php 
                        if(isset($connect,$_GET['delete_id'])){
                            if(isset($connect,$_SESSION['userrole'])=='admin'){
                            $delete_id = mysqli_real_escape_string($connect,$_GET['delete_id']);
                            
                            $query="SELECT * FROM `posts` WHERE post_id=$delete_id";
                            $result=mysqli_query($connect,$query);
                            $row=mysqli_fetch_assoc($result);
                            $post_image=$row['post_image'];
                            $img_path='../image/'.$post_image;
                            if(file_exists($img_path)){
                                unlink($img_path);
                            }
                            $query="DELETE FROM `posts` WHERE post_id=$delete_id";
                            mysqli_query($connect,$query);
                            header('location:post.php');
                            }          
                        }
                     ?>
                 <!--     if($option_value==='delete'){
                    $query="SELECT * FROM `posts` WHERE post_id=$data";
                    $result=mysqli_query($connect,$query);
                    $row=mysqli_fetch_assoc($result);
                    $post_image=$row['post_image'];
                    $img_path='../image/'.$post_image;
                    if(file_exists($img_path)){
                        unlink($img_path);
                    }
                    $query="DELETE FROM `posts` WHERE post_id=$data";
                    mysqli_query($connect,$query);
                    }elseif($option_value==='clone'){
                    $query="SELECT * FROM posts WHERE post_id=$data";
                    $result=mysqli_query($connect,$query);
                    while ($row=mysqli_fetch_assoc($result)) {
                        
                    } -->