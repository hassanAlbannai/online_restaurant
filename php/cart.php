<?php 

/*add isset to the get */
$id = $_GET["id"];
$uri = $_GET["back"];
$cart=$_COOKIE["cart"]??"";
$quantity = 1;
if(isset($_GET["quantity"])){
    $quantity = $_GET["quantity"];

}

if(strlen($cart)>0){
  $cart = explode(',',$cart);
  for($i=0;$i<$quantity;$i++){
    array_push($cart,$id);
  }
  
}else{
    $cart = [];
    for($i=0;$i<$quantity;$i++){
        array_push($cart,$id);
      }
}
$uri= substr($uri,strpos($_GET["back"],"/",3)+1);
setcookie("cart",implode(',',$cart),time()+(30 * 24 * 60 * 60),"/");
if($uri == "index.php"){
    header("location:../".$uri."#Gallery");
}else{
    header("location:../".$uri);
}
?>