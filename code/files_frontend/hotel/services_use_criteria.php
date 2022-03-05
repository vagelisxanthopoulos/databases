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
        <form action="services_use.php" method="post">

            <label for="fname">Cost Slot in Euros (optional)</label></br>

            <label for="fname">min:</label>

            <input type="text" id="fname" name="min" placeholder="e.g. 15">

            <label for="fname">max:</label>

            <input type="text" id="lname" name="max" placeholder="e.g. 30"></br>



            <label for="fname">Service Name (optional)</label></br>

            <input type="textfull" id="lname" name="service" placeholder="case sensitive">



            <label for="fname">Select Date Slot (optional)</label></br>

            <label for="start">from:</label>

            <input type="date" id="startdate" name="startdate" value="2021-01-01" min="2021-01-01" max="2021-03-31">

            <label for="end">to:</label>

            <input type="date" id="enddate" name="enddate" value="2021-03-31" min="2021-01-01" max="2021-03-31">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>