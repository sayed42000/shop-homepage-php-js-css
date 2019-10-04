<?php
function set_message($msg){
    if(!empty($msg)){
    $_SESSION['message']=$msg;       
    }else{
        $msg="";
    }
}
function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
function location($location){
    return header("Location:".$location);
}
function query($sql){
    global $connect;
    return mysqli_query($connect,$sql);
}
function confirm($result){
    global $connect;

    if(!$result){
        die('Query Failed'.mysqli_error($connect));
    }
}
function escapeString($result){
    global $connect;
    return mysqli_real_escape_string($connect,$result);
}
function fetchArray($result){
    return mysqli_fetch_array($result);
}
?>