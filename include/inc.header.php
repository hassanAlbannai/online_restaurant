<?php 
   //the meal object is created in both index and details so no need to create it here
    $mealarray = $mealobj->getAllMeals(); 
    
    
    $cart=$_COOKIE["cart"]??"";
    if(strlen($cart)>0){
      $cart = explode(',',$cart);
    }else{
      $cart = [];
    }
    
    ?>

<div class="stickydiv p-0 ps-l-5 ps-xl-5 ps-xxl-5 pe-l-5 pe-xl-5 pe-xxl-5">
  <nav class="topnav navbar navbar-expand-lg navbar-dark p-0 ps-l-5 ps-xl-5 ps-xxl-5 pe-l-5 pe-xl-5 pe-xxl-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="projectImages/logo-White.svg" alt="delivery man" width="100px" class="logo" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item transparent">
            <a class="nav-link active p-0" aria-current="page" href="index.php#">Home</a>
          </li>
          <li class="nav-item transparent">
            <a class="nav-link p-0" href="index.php#Menu">Menu</a>
          </li>
          <li class="nav-item transparent">
            <a class="nav-link p-0" href="index.php#Gallery">Gallery</a>
          </li>
          <li class="nav-item transparent">
            <a class="nav-link p-0" href="index.php#Testimonail">Testimonail</a>
          </li>
          <li class="nav-item red"><a class="nav-link p-0">Search</a></li>
          <li class="nav-item red"><a class="nav-link p-0">Profile</a></li>
          <li class="nav-item red bb">
            <a id="cartb" class="nav-link p-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Cart
              <p id="cartnum"><?php echo count($cart);  ?></p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart content</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">Item</div>
          <div class="col-6">Price</div>
          <?php 
              $total=0;
              if(count($cart)>0):
                foreach($cart as $e):
                  foreach($mealarray as $meal):
                    if($meal["id"] == $e):
                      $total += $meal["price"];
              ?>
          <div class="col-6"><?php echo $meal["title"];  ?></div>
          <div class="col-6"><?php echo round($meal["price"],2);  ?> SAR</div>

          <?php
              endif; 
            endforeach;
          endforeach;
              endif ;
              ?>
        </div>
        <div class="row">
          <div class="col-6">Total</div>
          <div id="total" class="col-6"><?php echo $total; ?> SAR</div>
        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="buttons clsb" data-bs-dismiss="modal">
          Close
        </button>
        <form method="post" action="php/order.php">
          <input type="hidden" name="cart" value=<?php echo implode(',',$cart); ?>>
          <input type="hidden" name="total" value=<?php echo $total; ?>>
          <input type="hidden" name="back" value=<?php echo $_SERVER['REQUEST_URI']; ?>>
          <input type="submit" id="ordernow" class="buttons" value="order now">
        </form>

      </div>
    </div>
  </div>
</div>