<?php include_once "database.php"; ?>
<?php include_once "layout/header.php"; ?>
<?php ob_start(); ?>


    <!-- Navigation -->
<?php include_once "layout/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                    if(isset($_POST['search'])){
                         $search= $_POST['search_result'];

                        $query="SELECT * FROM posts WHERE post_tag LIKE '%$search%'";
                        $result=mysqli_query($connect,$query);
                        $count =mysqli_num_rows($result);
                            if($count>0){
                        // $query="SELECT * FROM posts";
                        // $result=mysqli_query($connect,$query);
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
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php
                    }
                     }else{
                        echo "Not Found";
                         }
                     }else{
                        header('location:index.php');
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
            <div class="col-md-4">

            <?php include_once "layout/sidebar.php"; ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <?php include_once "layout/footer.php"; ?>
