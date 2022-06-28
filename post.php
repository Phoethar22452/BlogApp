<?php include_once "database.php"; ?>
<?php include_once "layout/header.php"; ?>



    <!-- Navigation -->
<?php include_once "layout/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                    if(isset($_GET['post_id'])){
                        $post_id=mysqli_real_escape_string($connect,$_GET['post_id']);
                        $post_count_query="UPDATE `posts` SET 
                        `post_view_count`=post_view_count+1  WHERE post_id=$post_id";
                        $post_view_count=mysqli_query($connect,$post_count_query);
                    }else{
                        header('location:index.php');
                    }
                    $query="SELECT * FROM `posts` WHERE post_id=$post_id"; // post.php?post_id=1a'
                    $result=mysqli_query($connect,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                ?>  


                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="image/<?php echo $post_image ?>" alt="">
                
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>
                <?php
                    }
                 ?>

                                <!-- Blog Comments -->
                <?php 
                    if(isset($_POST['create_comment'])){
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];

                        $query="INSERT INTO `comments`( `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ($post_id,'$comment_author','$comment_email','$comment_content','unapproved',now())";
                        $result=mysqli_query($connect,$query);
                        
                        $query="UPDATE `posts` SET `post_comment_count`=post_comment_count+1 WHERE post_id=$post_id";
                        mysqli_query($connect,$query);
                    }
                 ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="comment_author" class="form-control" placeholder="Please Enter Your Name" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" name="comment_email" class="form-control" placeholder="Please Enter Your Email" required="">
                        </div>
                        <div class="form-group">
                            <textarea name="comment_content" placeholder="Please Enter Your Comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php 
                    $query="SELECT * FROM `comments` WHERE comment_post_id=$post_id AND comment_status='approved' ORDER BY comment_id DESC";
                    $result=mysqli_query($connect,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        $comment_author=$row['comment_author'];
                        $comment_date=$row['comment_date'];
                        $comment_content=$row['comment_content'];
                 ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                <?php 
                    }
                 ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4" style="position: sticky; top:60px;">

            <?php include_once "layout/sidebar.php"; ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <?php include_once "layout/footer.php"; ?>
