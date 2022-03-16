var btn = document.getElementsByClassName("adds");
var card = document.getElementsByClassName("cardf");
var descb = document.getElementById("pills-home-tab");
var revb = document.getElementById("pills-profile-tab");
var total = 0;

for (let s = 0; s < card.length; s++) {
  card[s].addEventListener("click", (e) => {
    if (e.target != btn[s]) {
      var ids = btn[s].id.substring(1);
      location.href = "detail.php?id=" + ids;
    }
  });
}

descb.addEventListener("click", (e) => {
  if (!descb.classList.contains("bg-warning")) {
    descb.classList.add("bg-warning");
    revb.classList.remove("bg-warning");
  }
});
revb.addEventListener("click", (e) => {
  if (!revb.classList.contains("bg-warning")) {
    revb.classList.add("bg-warning");
    descb.classList.remove("bg-warning");
  }
});

function showReviews(button) {
  let ajax = new XMLHttpRequest();
  ajax.open("GET", "php/review.php?id=" + button.classList[0], true);

  ajax.send();
  ajax.onreadystatechange = () => {
    if (ajax.readyState === 4 && ajax.status === 200) {
      if (ajax.response) {
        let data = JSON.parse(ajax.response);
        console.log(data);

        document.querySelector("#cont").innerHTML = `<div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="3"
            aria-label="Slide 4"
          ></button>
        </div>



        <div id="corinner" class="carousel-inner">
          
        


        
          
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
`;
        let x = 0;
        data.forEach((review) => {
          if (x === 0) {
            x++;
            document.querySelector("#corinner").innerHTML +=
              `<div class="carousel-item active">
    <div class="row cardrow">
      <div
        class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 pe-0"
      >
        <img
          class="Timg"
          src="projectImages/` +
              review["image"] +
              `"
          alt="review image"
        />
      </div>
      <div
        class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 Ttext"
      >
      <h4>
      ` +
              review["reviewer_name"] +
              `
      </h4>
      <h5>
      
      ` +
              review["city"] +
              ` - 
      ` +
              review["date"] +
              `
              ` +
              `&#11088`.repeat(review["rating"]) +
              `
             
      </h5>
        <p>
        ` +
              review["review"] +
              `
        </p>
      </div>
    </div>
  </div>`;
          } else {
            document.querySelector("#corinner").innerHTML +=
              `<div class="carousel-item">
    <div class="row cardrow">
      <div
        class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 pe-0"
      >
        <img
          class="Timg"
          src="projectImages/` +
              review["image"] +
              `"
          alt="review image"
        />
      </div>
      <div
        class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 Ttext"
      >
      <h4>
      ` +
              review["reviewer_name"] +
              `
      </h4>
      <h5>
      
      ` +
              review["city"] +
              ` - 
      ` +
              review["date"] +
              `
              ` +
              `&#11088`.repeat(review["rating"]) +
              `
      </h5>
        <p>
        ` +
              review["review"] +
              `
        </p>
      </div>
    </div>
  </div>`;
          }
        });

        /* */
      } else {
        document.querySelector("#cont").innerHTML = "<h3>no reviews</h3>";
      }
    }
  };
}

function changeQuantity(button) {
  var quantity = document.getElementById("quantity");
  var num = parseInt(quantity.value);
  if (button.value == "-" && num > 1) {
    quantity.value = num - 1;
  } else if (button.value == "+") {
    quantity.value = num + 1;
  }
}
//unused functions from earlier challenges
/*function addcart() {
  var quantity = document.getElementById("quantity");
  var q = parseInt(quantity.value);
  var cartnum = document.getElementById("cartnum");
  cartnum.textContent = parseInt(cartnum.textContent) + q;
} */

/*function ordernow() {
  var cartnum = document.getElementById("cartnum");
  var cartbody = document.getElementsByClassName("modal-body")[0];
  var totalelem = document.getElementById("total");
  var list = cartbody.children[0].children;
  var x = list.length;

  for (let i = 2; i < x; i++) {
    cartbody.children[0].removeChild(list[2]);
  }

  cartnum.textContent = 0;
  total = 0;
  totalelem.textContent = total + " SAR";
} */

/*function addone(cardb) {
  console.log(cardb);
  var cartbody = document.getElementsByClassName("modal-body")[0];
  var cartnum = document.getElementById("cartnum");
  var cards = document.getElementById("cards");
  var totalelem = document.getElementById("total");
  var cardchild = cards.children;
  var button = document.getElementById(cardb);

  for (let i = 0; i < cardchild.length; i++) {
    var name = cardchild[i].children[2];
    if (cardchild[i].children[4].children[0].children[0].children[1] == button) {
      var text = document.createElement("div");
      var node = document.createTextNode(name.textContent);
      var text2 = document.createElement("div");
      var price = document.createTextNode(
        cardchild[i].children[4].children[0].children[0].textContent
      );
      total =
        total + parseFloat(cardchild[i].children[4].children[0].children[0].textContent);
      totalelem.textContent = total.toFixed(1) + " SAR";

      text.classList.add("col-6");
      text2.classList.add("col-6");

      text.appendChild(node);
      text2.appendChild(price);
      cartbody.children[0].appendChild(text);
      cartbody.children[0].appendChild(text2);
    }
  }

  cartnum.textContent = parseInt(cartnum.textContent) + 1;
}
*/

function changeDisplay() {
  var reviewdiv = document.getElementById("addReview");

  if (reviewdiv.style.display === "block") {
    reviewdiv.style.marginLeft = "900px";
    setTimeout(() => {
      reviewdiv.style.display = "none";
    }, 1000);
  } else {
    reviewdiv.style.display = "block";
    setTimeout(() => {
      reviewdiv.style.marginLeft = "0px";
    }, 100);
  }
}

function submit() {
  var revarea = document.getElementsByClassName("revarea")[0];
  var typereview = document.getElementById("typereview");
  var namefield = document.getElementsByClassName("namefield")[0];

  if (revarea.value === "") {
    typereview.style.display = "block";
  } else {
    if (namefield.value === "") {
      namefield.value = "customer";
    }
    var img = document.getElementById("img").files[0];

    var rating = document.getElementById("range").value;
    var name = document.getElementById("uname").value;
    var review = document.getElementById("revtext").value;
    var ucity = document.getElementById("ucity").value;
    ucity = ucity == "" ? "unknown" : ucity;
    var mealid = document.getElementById("mealid").value;
    var UTC = new Date().toJSON().slice(0, 10).replace(/-/g, "/");
    var info = [
      {
        reviewer_name: name,
        city: ucity,
        date: UTC,
        rating: rating,
        review: review,
        meal_id: mealid,
      },
    ];

    info = JSON.stringify(info);

    let ajax2 = new XMLHttpRequest();
    ajax2.open("POST", "php/review.php", true);
    let data2 = new FormData();
    data2.append("review", info);
    data2.append("image", img);
    ajax2.send(data2);
    ajax2.onreadystatechange = () => {
      if (ajax2.readyState === 4 && ajax2.status === 200) {
        if (ajax2.response) {
          showReviews(document.getElementById("pills-profile-tab"));
        }
      }
    };
  }
  changeDisplay();
}

function count() {
  var length = document.getElementsByClassName("revarea")[0].value.length;
  var counter = document.getElementById("count");
  var type = document.getElementById("typereview");
  counter.textContent = length + "/500";
  if (type.style.display === "block") {
    type.style.display = "none";
  }
}
