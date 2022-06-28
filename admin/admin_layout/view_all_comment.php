                    <div class="col-md-12">
                        <table class="table table-responsive table-hover table-bordered">
                            <tr>
                                <th>No:</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>From Response</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapproved</th>
                                <th>Delete</th>
                            </tr>
                            <?php 
                                $no=1;
                                $query="SELECT * FROM `comments`";
                                $result=mysqli_query($connect,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                	$comment_id=$row['comment_id'];
                                	$comment_post_id=$row['comment_post_id'];
                                    $comment_author=$row['comment_author'];
                                    $comment_content=$row['comment_content'];
                                    $comment_email=$row['comment_email'];
                                    $comment_status=$row['comment_status'];
                                    
                                    $comment_date=$row['comment_date'];
                             ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $comment_author ?></td>
                                <td><?php echo $comment_content ?></td>
                                <td><?php echo $comment_email ?></td>
                                <td><?php echo $comment_status ?></td>
                                <td></td>
                                <?php 
                                	$comment_query="SELECT * FROM posts WHERE post_id=$comment_post_id";
                                	$comment_result=mysqli_query($connect,$comment_query);
                                	while($row=mysqli_fetch_assoc($comment_result)){
                                		$post_id=$row['post_id'];
                                		$post_title=$row['post_title'];
                                 ?>
                                 <td><a href="../post.php?post_id=<?php echo $post_id?>"><?php echo $post_title; ?></a></td>
                                 <?php 
                                 	}
                                  ?>
                                <td><?php echo $comment_date ?></td>
                				<td><a href="comment.php?approve_id=<?php echo $comment_id; ?>" class="btn btn-success">Approve</a></td>
                				<td><a href="comment.php?unapprove_id=<?php echo $comment_id; ?>" class="btn btn-warning">Unapprove</a></td>
                				<td><a href="comment.php?delete_id=<?php echo $comment_id; ?>" class="btn btn-danger">Deletes</a></td>
                            </tr>
                            <?php 
                                }
                             ?>
                        </table>
                    </div>

                    <?php 
                        if(isset($connect,$_GET['delete_id'])){
                            $delete_id = mysqli_real_escape_string($connect,$_GET['delete_id']);
                            
                            $query="DELETE FROM `comments` WHERE comment_id=$delete_id";
                            mysqli_query($connect,$query);
                            header('location:comment.php');
                        }
                        if(isset($connect,$_GET['approve_id'])){
                            $approve_id = mysqli_real_escape_string($connect,$_GET['approve_id']);
                            
                            $query="UPDATE `comments` SET `comment_status`='approved' WHERE comment_id=$approve_id";
                            mysqli_query($connect,$query);
                            header('location:comment.php');
                        }
                        if(isset($connect,$_GET['unapprove_id'])){
                            $unapprove_id = mysqli_real_escape_string($connect,$_GET['unapprove_id']);
                            
                            $query="UPDATE `comments` SET `comment_status`='unapproved' WHERE comment_id=$unapprove_id";
                            mysqli_query($connect,$query);
                            header('location:comment.php');
                        }
                     ?>