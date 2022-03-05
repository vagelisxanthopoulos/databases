<?php ?>
<!doctype html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>


<style>
  .eskeret {
    font-family: 'Advent Pro';
    font-size: 40px;
  }

  .img-hover-zoom {
    height: 400px;
    /* [1.1] Set it as per your need */
    overflow: hidden;
    /* [1.2] Hide the overflowing of child elements */
  }

  /* [2] Transition property for smooth transformation of images */
  .img-hover-zoom img {
    transition: transform .5s ease;
  }

  /* [3] Finally, transforming the image when container gets hovered */
  .img-hover-zoom:hover img {
    transform: scale(1.14);
  }

  .navbar-nav li:hover>.dropdown-menu {
    display: block;
  }
</style>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title> Covid-Free Hotel </title>

</head>

<body style="background-image: url('/img/hotelpage/back.jpg'); background-size: cover;">
  <?php include('navbar.php'); ?>
  </br>

  <div class="d-flex justify-content-around">
    <div class="img-hover-zoom">
      <h3 class="eskeret">Restaurant</h3>
      </br>
      <img src="/img/hotelpage/first.jpg" width=500 height=300>
    </div>
    <div class="img-hover-zoom">
      <h3 class="eskeret">Bar</h3>
      </br>
      <img src="/img/hotelpage/second.jpg" width=500 height=300>
    </div>
    <div class="img-hover-zoom">
      <h3 class="eskeret">Conference Room</h3>
      </br>
      <img src="/img/hotelpage/third.jpg" width=500 height=300>
    </div>
  </div>
  <div class="d-flex justify-content-around">
    <div class="img-hover-zoom">
      <h3 class="eskeret">Gym</h3>
      </br>
      <img src="/img/hotelpage/fourth.jpg" width=500 height=300>
    </div>
    <div class="img-hover-zoom">
      <h3 class="eskeret">Sauna</h3>
      </br>
      <img src="/img/hotelpage/fifth.jpg" width=500 height=300>
    </div>
    <div class="img-hover-zoom">
      <h3 class="eskeret">Hair Salon</h3>
      </br>
      <img src="/img/hotelpage/sixth.jpg" width=500 height=300>
    </div>
  </div>
  </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>