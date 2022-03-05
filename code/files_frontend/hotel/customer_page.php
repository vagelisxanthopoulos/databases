<!DOCTYPE html>
<html lang="en">

<style>
    thead th {
        font-size: 1.3em;
    }

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
    <table class="table table-hover table-success table-striped table-borderless">
        <thead>
            <tr>
                <th>#</th>
                <th>NFC_ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Phone Number(s)</th>
                <th>Email(s)</th>
            </tr>
        </thead>
        <?php
        $host = "127.0.0.1";
        $port = 3306;
        $socket = "";
        $user = "root";
        $password = "ccdrokeiiiu512";
        $dbname = "hotel";

        $conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
            or die('Could not connect to the database server' . mysqli_connect_error());



        $quer = 'SELECT nfc_id, first_name, last_name, date_of_birth, phone, email FROM customer_info';

        $res = mysqli_query($conn, $quer);

        $phones = array_fill(0, 40, ""); //edw apothikeuoume ta tilefwna kathe pelati san string

        $emails = array_fill(0, 40, ""); //edw apothikeuoume ta emails kathe pelati san string

        $seenphones = [];

        $seenemails = [];

        $currnfc = 0;

        $clinum = -1;

        //i customer info exei join pelatwn me mail kai tilefwna
        //ara opou exoume parapanw apo ena mail i parapanw apo ena tilefwno -> exoume polla tuples me to idio nfc logw twn pollwn syndiasmwn pou yparxoun
        //opote mazeuoume ola ta til kai ta mail se ena
        //auto poy kanoume apo katw einai na kanoume append sto string tilefwnwn/mail tou kathe pelati to kathe KAINOURIO tilefwno/mail pou vriskoume gia auton
        //giafto theloume tous pinakes seenphones kai seenemails

        while ($cust = mysqli_fetch_assoc($res)) {

            //an to kainourio nfc einai diaforetiko apo to palio allaksame pelati

            if ($currnfc != $cust['nfc_id']) {
                $currnfc = $cust['nfc_id'];
                $clinum++;
                $seenphones = [];  //adeiazoume tous pinakes
                $seenemails = [];
            }

            //to prwto mail/til to vazoume, gia ta alla elegxoume
            if ($phones[$clinum] == "") {
                $phones[$clinum] = $cust['phone'];
                array_push($seenphones, $cust['phone']);
            } elseif (!in_array($cust['phone'], $seenphones)) {
                $phones[$clinum] .= ", " . $cust['phone'];
                array_push($seenphones, $cust['phone']);
            }

            if ($emails[$clinum] == "") {
                $emails[$clinum] = $cust['email'];
                array_push($seenemails, $cust['email']);
            } elseif (!in_array($cust['email'], $seenemails)) {
                $emails[$clinum] .= ", " . $cust['email'];
                array_push($seenemails, $cust['email']);
            }
        }

        mysqli_data_seek($res, 0); // this resets the cursor to the first row

        $currnfc = 0;

        $clinum = -1;

        $insertflag = false;

        while ($cust = mysqli_fetch_assoc($res)) {

            //kanoume insert mono otan allazei o pelatis
            if ($currnfc != $cust['nfc_id']) {
                $insertflag = true;
                $currnfc = $cust['nfc_id'];
                $clinum++;
            } else $insertflag = false;


            if ($insertflag) {
                $num = $clinum + 1;
                echo "<tr>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $cust['nfc_id'] . "</td>";
                echo "<td>" . $cust['first_name'] . "</td>";
                echo "<td>" . $cust['last_name'] . "</td>";
                echo "<td>" . $cust['date_of_birth'] . "</td>";
                echo "<td>" . $phones[$clinum] . "</td>";
                echo "<td>" . $emails[$clinum] . "</td>";
                echo "</tr>";
            }
        }

        $conn->close();
        ?>
    </table>
</body>

</html>