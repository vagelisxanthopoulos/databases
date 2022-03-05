<?php ?>
<!doctype html>
<html lang="en">

<link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>


<style>
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


    .eskeret {
        margin-top: 0px;
        margin-left: 42%;
        font-family: 'Alex Brush';
        font-size: 100px;
    }


    #SLIDE_BG {
        width: 100%;
        height: 93.9vh;
        background-position: center center;
        background-size: cover;
        backface-visibility: hidden;
        animation: slideBg 17s linear infinite 1s;
        animation-timing-function: ease-in-out;
        background-image: url('/img/hotelpage/slide1.jpg');
    }

    @keyframes slideBg {
        0% {
            background-image: url('/img/hotelpage/slide1.jpg');
        }

        25% {
            background-image: url('/img/hotelpage/slide6.jpg');
        }

        50% {
            background-image: url('/img/hotelpage/slide3.jpg');
        }

        75% {
            background-image: url('/img/hotelpage/slide4.jpg');
        }

        100% {
            background-image: url('/img/hotelpage/slide1.jpg');
        }
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

<body>
    <?php include('navbar.php'); ?>
    <div id="SLIDE_BG">
        <br/>
        <div class="eskeret">Welcome</div>
    </div>
</body>

</html>