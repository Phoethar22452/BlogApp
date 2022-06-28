<?php include_once "admin_layout/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include_once "admin_layout/nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

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

                    <?php 
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = '';
                        }
                        switch ($source) {
                            case 'add_post':
                                include_once "admin_layout/add_post.php";
                                break;
                            case 'edit_post':
                                include_once "admin_layout/edit_post.php";
                                break;
                            case 'value':
                                # code...
                                break;
                            
                            default:
                                include_once "admin_layout/view_all_comment.php";
                                break;
                        }
                     ?>
                </div>
                <!-- /.row -->

<?php include_once "admin_layout/footer.php"; ?>
