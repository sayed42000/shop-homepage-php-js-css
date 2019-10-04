<?php  require_once('../resources/config.php');?>
<?php include(TEMPLATE_FRONT.DS.'header.php');?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <?php include(TEMPLATE_FRONT.DS.'side_bar.php');?>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                    <?php include(TEMPLATE_FRONT.DS.'slider.php');?>
                    </div>

                </div>
                <?php  ?>

                <div class="row">

                <?php
                $sql="SELECT * FROM products";
                $result=query($sql);
                confirm($result);
                while($row=fetchArray($result)){?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $row['product_image']; ?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$<?php echo $row['product_price'];?></h4>
                                <h4><a href="item.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a>
                                </h4>
                                <p><?php echo $row['product_short_description']; ?> <a target="_blank" href="<?php echo $row['product_id']; ?>">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <a class="btn btn-primary"  href="cart.php?add=<?php echo $row['product_id']; ?>">Add To Cart</a>
                        </div>
                    </div>
                 <?php } ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT.DS.'footer.php');?>
<?php //echo $row['product_id']; ?>