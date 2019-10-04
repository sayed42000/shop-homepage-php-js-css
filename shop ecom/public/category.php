<?php  require_once('../resources/config.php');?>
<?php include(TEMPLATE_FRONT.DS.'header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
        <?php 

        if(isset($_GET['cat_id'])){
            $id=$_GET['cat_id'];
        }
        $sql="SELECT * FROM products WHERE product_category_id='$id'";
        $result=query($sql);
        confirm($result);
        while($row=fetchArray($result)){ 
        ?>


            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="<?php echo $row['product_image'] ?>" alt="">
                    <div class="caption">
                        <h3><?php echo $row['product_title'] ?></h3>
                        <p><?php echo $row['product_short_description'] ?></p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

        <?php } ?>
        </div>
        <!-- /.row -->
<?php include(TEMPLATE_FRONT.DS.'footer.php');?>
