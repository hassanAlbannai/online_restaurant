<?php 

$cartcontent = $_POST["cart"];
$total = $_POST["total"];
$uri = $_POST["back"];
$uri= substr($uri,strpos($uri,"/",2)+1);
if(strlen($cartcontent>0)){
$cartcontent = explode(',',$cartcontent);
$cartcontent= array_unique($cartcontent);
$cartcontent = implode(',',$cartcontent);
    setcookie("recent-bought",$cartcontent,time()+(30 * 24 * 60 * 60),"/");
    setcookie("cart","",time()+(86400 * 30),"/");
    header("location:../".$uri);

}else{
    header("location:../".$uri);
}

?>