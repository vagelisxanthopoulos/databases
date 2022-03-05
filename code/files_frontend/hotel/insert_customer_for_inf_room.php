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
        width: 600px;
        margin-top: 5%;
        margin-left: 35%;
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
        <form action="choose_nfc_id_for_inf_room.php" method="post">
            <label for="fname">Infected Customer's First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="case sensitive">


            </br>
            <label for="fname">Infected Customer's Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="case sensitive">
            <input type="submit" value="Find NFC_ID(s)">
        </form>
    </div>
</body>

</html>