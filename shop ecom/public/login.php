<?php  require_once('../resources/config.php');?>
<?php include(TEMPLATE_FRONT.DS.'header.php');?>

    <!-- Page Content -->
    <div class="container">
    <h1><?php display_message(); ?></h1>

    <?php
    if(isset($_POST['submit'])){
        $username=escapeString($_POST['username']);
        $password=escapeString($_POST['password']);

        $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result=query($sql);
        confirm($result);
        if(mysqli_num_rows($result)===0){
            set_message("Username and password is incorrect");
            location('login.php');
        }else{
            $_SESSION['username']=$username;
            location('admin');
        }

    }
    ?>

      <header>
            <h1 class="text-center">Login</h1>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT.DS.'footer.php');?>
