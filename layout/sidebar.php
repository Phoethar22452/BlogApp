                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search_result" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="search">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <div class="well">
                    <h4>Login Form</h4>
                    <form action="login.php" method="post">
                        <div class="form">
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required="">
                        </div><br>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required="">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="login">
                                Login
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                    $query="SELECT * FROM `categories`";
                                    $result=mysqli_query($connect,$query);
                                    foreach($result as $data){
                                        echo "<li>
                                                <a href='category.php?cat_id={$data['cat_id']}'>{$data['cat_title']}</a>
                                            </li>";
                                    }
                                 ?>
                            </ul>
                        </div>
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>