<?php  require_once('../resources/config.php');?>
<?php include(TEMPLATE_FRONT.DS.'header.php');?>


    <!-- Page Content -->
    <div class="container">

    

<!-- /.row --> 

<div class="row">

      <h4 class="text-center bg-danger"><?php display_message();?></h4>
      <h1>Checkout</h1>

<form action="">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
        <?php 
        $total=0;
        $item_total=0;
        foreach($_SESSION as $name=>$value){
            if($value>0){
        if(substr($name,0,8) == 'product_'){
            $length=strlen($name)-8;
            $id=substr($name , 8 , $length);
            $id=escapeString($id);
         $sql="SELECT * FROM products WHERE product_id='$id'";
        $result=query($sql);
        while($row=fetchArray($result)){
             $sub=$row['product_price']*$value;
             $item_total +=$value;
            
            ?>

            <tr>
                <td><?php echo $row['product_title'];?> </td>
                <td>$<?php echo $row['product_price'];?></td>
                <td><?php echo $value;?></td>
                <td>&#36;<?php echo $sub;?></td>
                <td>
                <a class="btn btn-warning" href="cart.php?remove=<?php echo $row['product_id']; ?>"><span class="glyphicon glyphicon-minus"></span></a>
                <a class="btn btn-success" href="cart.php?add=<?php echo $row['product_id']; ?>"><span class="glyphicon glyphicon-plus"></span></a>
                <a class="btn btn-danger" href="cart.php?delete=<?php echo $row['product_id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>              
              
            </tr>
            <?php }

                $_SESSION['item_total']=$total+=$sub;
                $_SESSION['item_quantity']=$item_total;      
                     
        
            } } }?>
        </tbody>
    </table>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">
<?php
echo isset($_SESSION['item_quantity'])?$_SESSION['item_quantity']=$item_total:$_SESSION['item_quantity']='0';
?>
</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&#36;
<?php
echo isset($_SESSION['item_total'])?$_SESSION['item_total']:$_SESSION['item_total']='0';
?>

</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


<?php include(TEMPLATE_FRONT.DS.'footer.php');?>

