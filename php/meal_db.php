<?php
class Meal_db{
    
    private $connection;
    public function __construct()
    {
        $this->connection = mysqli_connect('localhost:3308', 'root', '', 'meals');
        
        if ($this->connection === false) {
            die("error conecting" . mysqli_connect_error());
        }
        
    }
    
    public function getAllMeals(){
        $query = 'SELECT * FROM meal ';
        $meals = mysqli_query($this->connection, $query);
        $results = mysqli_fetch_all($meals, MYSQLI_ASSOC);
       
       for($i =1; $i<=count($results);$i++){
        $query = 'SELECT a.id, AVG(b.rating) as rating FROM meal a, reviews b where a.id=b.meal_id and a.id='.$i;
        $meals = mysqli_query($this->connection, $query);
        $res = mysqli_fetch_array($meals, MYSQLI_ASSOC);
        if($res == null){
            $results[$i-1]["rating"]=0;
        }else{
            
            $results[$i-1]["rating"]=$res["rating"];
        }

       }
       
       
        return $results;
    }
    public function getMealById($id){
        require_once 'php/meal.php';
        $meal = new Meal();
         $npart = $meal->getMealById($id-1)["nutrition"];

        $query = 'SELECT a.*, AVG(b.rating) as rating FROM meal a, reviews b WHERE a.id=b.meal_id AND a.id =' . $id . ' GROUP BY a.id';
        $meals = mysqli_query($this->connection, $query);
        
        $results = mysqli_fetch_array($meals, MYSQLI_ASSOC);
        if($results==null){
            $query = 'SELECT a.* FROM meal a, reviews b WHERE a.id =' . $id ;
            $meals = mysqli_query($this->connection, $query);
            
            $results = mysqli_fetch_array($meals, MYSQLI_ASSOC);
            $results["rating"] = 0;
        }
        $results["nutrition"]=$npart;
        
        return $results;
    }
    public function getMealReviews($mealid){
        $query   = 'SELECT * FROM reviews WHERE meal_id=' . $mealid;
        $reviews = mysqli_query($this->connection, $query);
        
        return mysqli_fetch_all($reviews, MYSQLI_ASSOC);
    }
    public function addMealReview($revName, $city, $date, $rating, $image, $review, $mealid){
        $query = "INSERT INTO `reviews` (`reviewer_name`, `city`, `date`, `rating`, `image`,
         `review`, `meal_id`) VALUES ('$revName','$city', '$date', '$rating',
         '$image', '$review', $mealid)";
        
        $results = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));
        return $results;
    }
    
}
?>