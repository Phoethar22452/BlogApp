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
                    if(isset($_GET['author'])){
                        $author=$_GET['author'];
                    }else{
                        header('location:index.php');
                    }
                    $query="SELECT * FROM `posts` WHERE post_author='$author'
                    AND post_status='public'";
                    $result=mysqli_query($connect,$query);
                    if(!$result){
                        die('failed');
                    }
                    while($row=mysqli_fetch_assoc($result)){
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                ?>  
                 <p class="lead">
                All Post By <?php echo $post_author ?>
                </p>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="post.php?post_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id; ?>"><img class="img-responsive" src="image/<?php echo $post_image ?>" alt=""></a>
                
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
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
