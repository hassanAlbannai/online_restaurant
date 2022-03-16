<!DOCTYPE html>
<html>

<head>
  <title>project</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  <?php 
    $id=isset($_GET["id"]) ? $_GET["id"] : 1 ;
    
    require_once 'php/meal_db.php';
    $mealobj = new Meal_db();
    $meals = $mealobj->getMealById($id);
     ?>
</head>

<body>
  <?php include 'include/inc.header.php'; ?>
  <div id="BS" class="BSS">
    <div class="row BS">
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 ps-0 pe-0 ms-0 me-0 BSgrid1">
        <img src="projectImages/<?php echo $meals["image"]?>" alt="Burger" />
      </div>

      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 ps-0 pe-0 ms-0 me-0 BSgrid2">
        <h1><?php echo $meals["title"]?></h1>
        <h3><?php echo round($meals["price"],2)?> SAR</h3>
        <h4>&#11088;<?php echo round($meals["rating"],2)?></h4>
        <p>
          <?php echo $meals["description"]?>
        </p>
        <div class="BSbuttons">
          <div class="spinnergrid">
            <form action="php/cart.php" method="get">
              <input type="hidden" name="id" value="<?php echo $meals["id"] ?>">
              <input type="hidden" name="back" value=<?php echo $_SERVER['REQUEST_URI']; ?>>
              <input type="button" onclick="changeQuantity(this)" class="spinnerbutton" value="-" />
              <!-- try to change this to span to avoid errors -->
              <input type="number" id="quantity" name="quantity" class="spinnernum spinnerbutton" value="1" />
              <input type="button" onclick="changeQuantity(this)" class="spinnerbutton" value="+" />
          </div>
          <div class="butongrid">
            <input type="submit" value="add to cart" class="buttons" />
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <ul class="nav nav-pills mb-3 pills" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active bg-warning text-danger" id="pills-home-tab" data-bs-toggle="pill"
        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
        description
      </button>
    </li>
    <li class="nav-item" role="presentation">

      <button class="<?php echo $id ?> nav-link text-danger" id="pills-profile-tab" data-bs-toggle="pill"
        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"
        onclick="showReviews(this)">
        review
      </button>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <section id="desc">
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alais
          dolore hic quaerat deserunt eum iusto architecturo, officia impedit
          consequuntur earum voluptatum totam quo minima molestiae velit
          nesciunt voluptas praesentium est.
          <br />
          <br />
          Nam nesciunt ex earum inventore corrupti consequuntur molestias
          accusamus eague, dignissimos exercitationem explicabo epedira adisci
          dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente
          tempora asperiores minus, hic, deleniti enim!
        </p>
      </section>

      <div id="NFTable" class="NFTable">
        <h4>nutrition facts</h4>

        <table class="ntable">
          <td colspan="3">
            <strong>Supplement Facts</strong>
          </td>

          <tr>
            <td colspan="3">
              <strong>Serving Size: </strong><?php echo $meals["nutrition"]["serving_size"]?>
            </td>
          </tr>

          <tr>
            <td colspan="3"><strong>Serving Per Container:
              </strong><?php echo $meals["nutrition"]["serving_per_container"]?></td>
          </tr>

          <tr class="color1">
            <td></td>
            <td>
              <strong>Amount Per Serving</strong>
            </td>
            <td>
              <strong>%Daily Value*</strong>
            </td>
          </tr>

          <?php 
          foreach($meals["nutrition"]["facts"] as $fact):
          ?>
          <tr>
            <td>
              <p><?php echo $fact["item"]?></p>
            </td>
            <td>
              <p><?php echo $fact["amount_per_serving"]?> <?php echo $fact["unit"]?></p>
            </td>
            <td><?php echo $fact["daily_value"]?></td>
          </tr>
          <?php endforeach; ?>

          <tr>
            <td colspan="3">
              <p>
                * Percet Daily Values are based on a 2,000 calore diet. Your
                daily values may be higher or lower depending on your calorie
                needs
              </p>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <section id="rev" class="rev">
        <!--
          <div class="row cardrow dr">
            <div
              class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 pe-0"
            >
              <img
                class="Timg"
                src="projectImages/<?php echo $meals["reviews"]["image"]?>"
                alt="Man eating Burger"
              />
            </div>
            <div
              class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 Ttext"
            >
              <h4><?php echo $meals["reviews"]["reviewer_name"]?></h4>
              <h5>
              <?php echo $meals["reviews"]["city"]?> - <?php echo $meals["reviews"]["date"]?> <?php for($i=0; $i<$meals["reviews"]["rating"];$i++){echo "&#11088;";}?>
              </h5>
              <p>
              <?php echo $meals["reviews"]["review"]?>
              </p>
            </div>
          </div>

        -->
        <div id=cont></div>

        <input class="buttons revbutton" type="button" value="Add Your Review" onclick="changeDisplay()" />
        <div id="addReview">
          <input type="hidden" id="mealid" value="<?php echo $meals["id"]?>">
          <p>Image</p>
          <input id="img" type="file" accept="image/*" />
          <p>Rate the Food</p>
          <input id="range" type="range" min="0" max="5" list="tickmarks" />
          <datalist id="tickmarks">
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
            <option value="4"></option>
            <option value="5"></option>
          </datalist>

          <p>Name</p>
          <input id="uname" type="text" class="namefield fieldcolor" placeholder="First and Last name" />
          <p>City</p>
          <input id="ucity" type="text" class="namefield fieldcolor" placeholder="City" />

          <p>Review</p>
          <p id="typereview">Please type your review</p>
          <textarea id="revtext" class="revarea fieldcolor" cols="30" rows="10" oninput="count()" maxlength="500"
            placeholder="Type your review here max 500 characters"></textarea>
          <p id="count">0/500</p>
          <div>
            <input type="button" class="buttons sbmt" onclick="submit()" value="Submit" />
          </div>
        </div>
      </section>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
      ...
    </div>
  </div>

  <?php
    include 'include/inc.footer.php';
    ?>

  <script src="app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
</body>

</html>