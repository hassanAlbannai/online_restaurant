<?php
$id  = "";
$rev = "";
require_once 'meal_db.php';
$mealobj = new Meal_db();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $reviews = $mealobj->getMealReviews($id);
    if (count($reviews) > 0) {
        $encodedRev = json_encode($reviews);
        
        echo $encodedRev;
    }
}
if (isset($_POST["review"])) {
    $file;
    $rev = $_POST["review"];
    $rev = json_decode($rev, true);
    $rev = $rev[0];
    
    if (isset($_FILES["image"])) {
        $file = $_FILES["image"];
        $target_file = "../reviewImages/" . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_file);
    } else {
        $file["name"] = "meal" . $rev["meal_id"].".png";
    }
    echo $mealobj->addMealReview($rev["reviewer_name"], $rev["city"], $rev["date"], $rev["rating"], $file["name"], $rev["review"], $rev["meal_id"]);
    
}

?>