<?php include_once "database.php"; ?>
<?php include_once "layout/header.php"; ?>


    <!-- Navigation -->
<?php include_once "layout/navigation.php"; ?>
<?php 
    if(isset($_POST['submit'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $firstname=mysqli_real_escape_string($connect,$firstname);
        $lastname=mysqli_real_escape_string($connect,$lastname);
        $username=mysqli_real_escape_string($connect,$username);
        $email=mysqli_real_escape_string($connect,$email);
        $password=mysqli_real_escape_string($connect,$password);

        $query="INSERT INTO `users`( `user_name`, `user_firstname`, `user_lastname`, `user_password`, `user_email`, `user_role`) VALUES ('$username','$firstname',
        '$lastname','$password','$email','subscriber')";
        mysqli_query($connect,$query);


    }
 ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
         <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                        <h1>Register</h1>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="firstname" class="sr-only">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Desired Firstname" required="">
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="sr-only">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Desired Lastname" required="">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password" required="">
                                </div>
                        
                                <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                            </form>
                         
                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>

        </div>
        <!-- /.row -->

        <hr>

        <?php include_once "layout/footer.php"; ?>
