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
        <form action="infected_customers.php" method="post">
            <label for="fname">Choose NFC_ID</label>
            <?php

            $host = "127.0.0.1";
            $port = 3306;
            $socket = "";
            $user = "root";
            $password = "ccdrokeiiiu512";
            $dbname = "hotel";

            $conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
                or die('Could not connect to the database server' . mysqli_connect_error());

            $first = trim($_POST["firstname"]);
            $last = trim($_POST["lastname"]);
            $quer = "select nfc_id";
            $quer .= " from customers";
            $quer .= " where first_name = '" . $first . "' and last_name = '" . $last . "'";

            $res = mysqli_query($conn, $quer);
            if (mysqli_num_rows($res) == 0) {
                echo "<h3>There is no such customer. Try Again</h3>";
            } else {
                echo "<select id='nfc' name='nfc_id'>";
                while ($tuple = mysqli_fetch_assoc($res)) {
                    echo "<option value=" . $tuple['nfc_id'] . ">" . $tuple['nfc_id'] . "</option>";
                }
                
                echo "</select>";
                echo "<input type='submit' value='Find potentialy infected customers'>";
            }
            $conn->close();

            ?>
        </form>
    </div>
</body>

</html>