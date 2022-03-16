<!DOCTYPE html>
<html>

<head>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>project</title>

  <?php
    require_once 'php/meal_db.php';
    $mealobj = new Meal_db();
    $meals = $mealobj->getAllMeals();
    $recent = [];
    if(isset($_COOKIE["recent-bought"])){
      $recent = explode(',',$_COOKIE["recent-bought"]);
    }
    ?>

</head>

<body class="indexbody">
  <?php include 'include/inc.header.php'; ?>
  <h1 class="partyheader">Party Time</h1>
  <main>
    <div Menu>
      <div class="shape">
        <h3 class="shapetext">Buy any two burgers and get 1.5L Pepsi Free</h3>
      </div>
      <input type="button" value="order now" class="buttons orderB" />
    </div>

    <?php 
         if(count($recent)>0):
          ?>
    <section id="recent-bought">
      <h2 class="title">Your Recent Bought Products</h2>

      <div id="cards" class="row cardrow me-0 ms-0">
        <?php
          
                  foreach($meals as $meal): 
                  foreach($recent as $item):
                  if($meal["id"] == $item):?>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12 cardf">
          <img src="projectImages/meal<?php echo $meal["id"] ?>.png" width="100%" alt="Burger" />
          <h4 class="pt-1">&#11088;<?php echo round($meal["rating"],1) ?> rating</h4>
          <h2><?php echo $meal["title"] ?></h2>
          <h3>some description</h3>
          <div>
            <h3>
              <form method="get" action="php/cart.php">
                <input type="hidden" name="id" value='<?php echo $meal["id"]; ?>'>
                <input type="hidden" name="back" value=<?php echo $_SERVER['REQUEST_URI']; ?>>
                <input id="b<?php echo $meal["id"] ?>" type="submit" class="buttons adds"
                  value="buy again" /><?php echo round($meal["price"],2) ?> SR

              </form>

            </h3>
          </div>
        </div>
        <?php endif; endforeach; endforeach;?>
      </div>
    </section>
    <?php endif; ?>

    <h2 id="Menu" class="eatheader">Want To Eat</h2>
    <p class="eatp">
      Try our most delicious food and usaully take minutes to deliver
    </p>

    <table class="foodt">
      <tr>
        <td>
          <p>pizza</p>
        </td>
        <td>
          <p>fast food</p>
        </td>
        <td>
          <p>cupcake</p>
        </td>
        <td>
          <p>Sandwich</p>
        </td>
        <td>
          <p>spaghetti</p>
        </td>
        <td>
          <p>Burger</p>
        </td>
      </tr>
    </table>

    <div class="row deliverygrid ps-0 pe-0 ms-0 me-0">
      <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12 me-0 ms-0 pe-0 ps-0">
        <img src="projectImages/delivery.png" alt="delivery man" class="deliveryimg" />
      </div>

      <div class="col-xxl-5 col-xl-4 col-lg-5 col-md-12 col-sm-12 col-xs-12 me-0 ms-0 pe-0 ps-0 griditem2">
        <div class="triangle">
          <h2>We guarantee 30 minutes delivery</h2>
        </div>

        <p class="deliverytext">
          If you are having a meeting, working late at night and need an extra
          push
        </p>
      </div>
    </div>
  </main>

  <section id="Gallery">
    <h2 class="title">Our most Popular Recipes</h2>
    <p class="titletext">
      Try our most delicious food and usaully take minutes to deliver
    </p>

    <div id="cards" class="row cardrow me-0 ms-0">

      <?php  foreach($meals as $meal): ?>
      <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12 cardf">
        <img src="projectImages/meal<?php echo $meal["id"] ?>.png" width="100%" alt="Burger" />
        <h4 class="pt-1">&#11088;<?php echo round($meal["rating"],1) ?> rating</h4>
        <h2><?php echo $meal["title"] ?></h2>
        <h3>some description</h3>
        <div>
          <h3>
            <form method="get" action="php/cart.php">
              <input type="hidden" name="id" value=<?php echo $meal["id"]; ?>>
              <input type="hidden" name="back" value=<?php echo $_SERVER['REQUEST_URI']; ?>>
              <input id="b<?php echo $meal["id"] ?>" type="submit" class="buttons adds"
                value="add to cart" /><?php echo round($meal["price"],2) ?> SR
              <!--the link of the cards that redirects to details.php is a javascript eventlistener-->
            </form>

          </h3>
        </div>
      </div>
      <?php endforeach ?>

    </div>
  </section>

  <section id="Testimonail">
    <h2 class="title">Client Testimonials</h2>

    <!--carousel-dark   carousel-dark-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row cardrow">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 pe-0">
              <img class="Timg" src="projectImages/man-eating-burger.png" alt="Man eating Burger" />
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 Ttext">
              <p>
                Lorem ipsum dolor sit amet consectectur adipisicing elit.
                Neque ullam deserunt laborun, ladoriosam veritatis quibusdam
                blanditiis dolor exercitationem velit commondi quae assumenda
                incidunt voluptas. Corporis ex nulla repellendus ullam nihil!
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row cardrow">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 pe-0">
              <img class="Timg" src="projectImages/man-eating-burger.png" alt="Man eating Burger" />
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 Ttext">
              <p>
                Lorem ipsum dolor sit amet consectectur adipisicing elit.
                Neque ullam deserunt laborun, ladoriosam veritatis quibusdam
                blanditiis dolor exercitationem velit commondi quae assumenda
                incidunt voluptas. Corporis ex nulla repellendus ullam nihil!
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row cardrow">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 pe-0">
              <img class="Timg" src="projectImages/man-eating-burger.png" alt="Man eating Burger" />
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 Ttext">
              <p>
                Lorem ipsum dolor sit amet consectectur adipisicing elit.
                Neque ullam deserunt laborun, ladoriosam veritatis quibusdam
                blanditiis dolor exercitationem velit commondi quae assumenda
                incidunt voluptas. Corporis ex nulla repellendus ullam nihil!
              </p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <?php
    include 'include/inc.footer.php';
    ?>
  <script src="app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
</body>

</html>