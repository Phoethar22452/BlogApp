<?php include_once "database.php"; ?>
<?php include_once "layout/header.php"; ?>


    <!-- Navigation -->
<?php include_once "layout/navigation.php"; ?>
<?php
// the message
//$msg = "First line of text\nSecond line of text";

/// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail("someone@example.com","My subject",$msg);
//?>
<?php 
    if(isset($_POST['submit'])){
        $to="tanginapota1234@gmail.com";
        $subjet=wordwrap($_POST['subject']);
        $body=$_POST['body'];
        $email=$_POST['email'];
        mail($to,$subject,$body,$email);
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
                        <h1>Contact Us</h1>
                            <form action="" method="post">
                                 <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required="">
                                </div>
                                 <div class="form-group">
                                    <label for="password" class="sr-only">Subject</label>
                                    <input type="text" name="subject" id="key" class="form-control" placeholder="Subject" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="body" class="form-control" 
                                    id="" cols="30" rows="10"></textarea>
                            /div>
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
