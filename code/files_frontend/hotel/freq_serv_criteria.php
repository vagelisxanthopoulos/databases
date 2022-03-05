<?php ?>
<!doctype html>
<html lang="en">

<style>
    .img-hover-zoom {
        height: 350px;
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


    input[type=text],
    select {
        width: 39%;
        padding: 12px 20px;
        margin-top: 4px;
        margin-bottom: 10px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=textfull],
    select {
        width: 100%;
        padding: 12px 20px;
        margin-top: 4px;
        margin-bottom: 10px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .fform {
        border-radius: 5px;
        background-color: #f2f2f2;
        height: 20%;
        width: 420px;
        margin-top: 3%;
        margin-left: 38%;
        padding: 20px;
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
<script type="text/javascript">
    window.addEventListener('keydown', function(e) {
        if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
            if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
                e.preventDefault();
                return false;
            }
        }
    }, true);
</script>

<body style="background-image: url('/img/hotelpage/back.jpg'); background-size: cover;">
    <?php include('navbar.php'); ?>
    </br>
    </br>

    <div class="fform">
        <form action="freq_serv.php" method="post">

            <label for="fname">Select Age Slot</label></br>

            <select id='ageslot' name='ageslot'>
                <option value="first">20-40</option>
                <option value="second">41-60</option>
                <option value="third">61+</option>
            </select>


            <label for="fname">Select Date Slot</label></br>

            <select id='dateslot' name='dateslot'>
                <option value="month">Last Month</option>
                <option value="year">Last Year</option>
            </select>

            <input type="submit" value="Find most frequently used services">
        </form>
    </div>
</body>

</html>