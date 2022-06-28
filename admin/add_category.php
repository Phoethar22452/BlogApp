<?php include_once "admin_layout/header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include_once "admin_layout/nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">
<!-- <?php if($connect){echo "success";}else{echo "fail";} ?> -->
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin Panel
                            <small>Name</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <?php 
                            if(isset($_POST['add_category'])){
                                $cat_title =$_POST['cat_title'];
                                $query="INSERT INTO `categories`(`cat_title`) VALUES ('$cat_title')";
                                mysqli_query($connect,$query);   
                            }
                         ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="" class="control-label">Add Category
                                </label>
                                <input type="text" class="form-control" name="cat_title" required="">
                            </div> 
                            <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="add_category" value="Add category">
                            </div>
                        </form>
                    
                    <?php 
                        if(isset($_GET['edit_id'])){
                            $edit_id=$_GET['edit_id'];
                            $query="SELECT * FROM categories WHERE cat_id=$edit_id";
                            $result=mysqli_query($connect,$query);
                            $row=mysqli_fetch_assoc($result);
                            

                        if(isset($_POST['cat_title'])){
                            $cat_title=$_POST['cat_title'];

                            $query="UPDATE categories SET `cat_title`='$cat_title' WHERE cat_id='$edit_id'";
                            mysqli_query($connect,$query);
                            header('location:add_category.php');
                        }
                      
                     ?>
                     <form action="" method="post">
                            <div class="form-group">
                                <label for="" class="control-label">Update Category
                                </label>
                                <input type="text" class="form-control" name="cat_title" required="" value="<?php echo $row['cat_title'] ?>">
                            </div> 
                            <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="update_category" value="update category">
                            </div>
                        </form>
                     <?php 
                         }
                      ?>
                     </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>NO.</th>
                                <th>Category Title</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <?php 
                                $no =1;
                                $query="SELECT * FROM categories ";
                                $result=mysqli_query($connect,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                    $cat_id=$row['cat_id'];
                                    $cat_title =$row['cat_title'];
                                
                             ?>
                             
                            <tr>
                                <th><?php echo $no++ ?></th>
                                <th><?php echo $cat_title ?></th>
                                <th><a href="add_category.php?edit_id=<?php echo $cat_id ?>" class="btn btn-primary">Update</a></th>
                                <th><a href="add_category.php?delete_id=<?php echo $cat_id ?>" class="btn btn-danger">Delete</a></th>
                            </tr>
                            <?php 
                                }
                              ?>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            <?php include_once "admin_layout/footer.php" ?> 

            <?php 
                if(isset($_GET['delete_id'])){
                    $delete_id=$_GET['delete_id'];
                    $query="DELETE FROM categories WHERE cat_id='$delete_id'";
                    mysqli_query($connect,$query);
                    header('location:add_category.php');
                }
             ?>