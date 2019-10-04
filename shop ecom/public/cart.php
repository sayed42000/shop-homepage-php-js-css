<?php  require_once('../resources/config.php');?>
<?php
if(isset($_GET['add'])){
    $id=$_GET['add'];
    $id=escapeString($id);
    $sql="SELECT * FROM products WHERE product_id='$id'";
    $result=query($sql);
    $row=fetchArray($result);
    if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]){
        $_SESSION['product_'.$_GET['add']] +=1;
        location('checkout.php');
    }else{
        set_message('WE have only '.$row['product_quantity'] .' '.$row['product_title'].' available');
        location('../public/checkout.php');
    }
}
if(isset($_GET['remove'])){
    $_SESSION['product_'.$_GET['remove']]--;
    if($_SESSION['product_'.$_GET['remove']] < 1){
         unset($_SESSION['item_total']);
         unset($_SESSION['item_quantity']);       
        location('../public/checkout.php');
    }else{
        location('../public/checkout.php');
    }
}
if(isset($_GET['delete'])){
    $_SESSION['product_'.$_GET['delete']]='0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    location('../public/checkout.php');
}

?>