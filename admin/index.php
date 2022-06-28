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
                            <small>Name by <?php echo $_SESSION['username'] ?></small>
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
                </div>
                <!-- /.row -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                            $query="SELECT * FROM posts";
                            $result=mysqli_query($connect,$query);
                            $post_count=mysqli_num_rows($result);
                            echo "<div class='huge'>{$post_count}</div>";
                         ?>
                  <!-- <div class='huge'>12</div> -->
                  <?php 
                    $public_query="SELECT * FROM posts WHERE post_status='public'";
                    $public_result=mysqli_query($connect,$public_query);
                    $public_count=mysqli_num_rows($public_result);

                    $hide_query="SELECT * FROM posts WHERE post_status='hide'";
                    $hide_result=mysqli_query($connect,$hide_query);
                    $hide_count=mysqli_num_rows($hide_result);
                   ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                            $query="SELECT * FROM comments";
                            $result=mysqli_query($connect,$query);
                            $comment_count=mysqli_num_rows($result);
                            echo "<div class='huge'>{$comment_count}</div>";
                         ?>
                     <!-- <div class='huge'>23</div> -->
                     <?php 
                        $approve_query="SELECT * FROM comments WHERE comment_status='approved'";
                        $approve_result=mysqli_query($connect,$approve_query);
                        $approve_count=mysqli_num_rows($approve_result);

                        $unapprove_query="SELECT * FROM comments WHERE comment_status='unapproved'";
                        $unapprove_result=mysqli_query($connect,$unapprove_query);
                        $unapprove_count=mysqli_num_rows($unapprove_result);

                      ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                            $query="SELECT * FROM users";
                            $result=mysqli_query($connect,$query);
                            $user_count=mysqli_num_rows($result);
                            echo "<div class='huge'>{$user_count}</div>";
                         ?>
                    <!-- <div class='huge'>23</div> -->
                    <?php 
                        $admin_query="SELECT * FROM users WHERE user_role='admin'";
                        $admin_result=mysqli_query($connect,$admin_query);
                        $admin_count=mysqli_num_rows($admin_result);

                        $subscriber_query="SELECT * FROM users WHERE user_role='subscriber'";
                        $subscriber_result=mysqli_query($connect,$admin_query);
                        $subscriber_count=mysqli_num_rows($subscriber_result);
                     ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="user.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                            $query="SELECT * FROM categories";
                            $result=mysqli_query($connect,$query);
                            $category_count=mysqli_num_rows($result);
                            echo "<div class='huge'>{$category_count}</div>";
                         ?>
                        <!-- <div class='huge'>13</div> -->
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="add_category.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          ["Public Posts", <?php echo $public_count; ?>],
          ["Hide Posts", <?php echo $hide_count; ?>],
          ["Approve Count", <?php echo $approve_count; ?>],
          ["Unapprove Count", <?php echo $unapprove_count; ?>],
          ["Admin Count", <?php echo $admin_count; ?>],
          ["Subscriber Count", <?php echo $subscriber_count; ?>],
          ["Categories Count", <?php echo $category_count; ?>],
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
    <div id="top_x_div" style="width: 800px; height: 600px;"></div>
</div>

<?php include_once "admin_layout/footer.php"; ?>
