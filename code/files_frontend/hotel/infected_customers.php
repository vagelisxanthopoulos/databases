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

        //pairnoume to nfc kai typwnoume tous pithana molysmenous pelates (an yparxoun)

        $nfc = $_POST["nfc_id"];
        $quer = "with dangerous(room_id, startt, endd) as";
        $quer .= " (select room_id_visits, in_date_time, out_date_time";
        $quer .= " from visits";
        $quer .= " where nfc_id_visits = " . $nfc. "),";
        $quer .= " infected_nfc_ids(nfc) as";
        $quer .= " (select distinct visits.nfc_id_visits";
        $quer .= " from visits inner join dangerous on visits.room_id_visits = dangerous.room_id";
        $quer .= " where visits.nfc_id_visits != " . $nfc . " and TIMESTAMPDIFF(minute, visits.out_date_time, dangerous.startt) <= 0 and TIMESTAMPDIFF(minute, dangerous.endd, visits.in_date_time) <= 60)";
        $quer .= " select nfc_id, first_name, last_name";
        $quer .= " from infected_nfc_ids inner join customers on infected_nfc_ids.nfc = customers.nfc_id";
        $quer .= " order by nfc_id"; 

        $res = mysqli_query($conn, $quer);

        $num = 0;

        if (mysqli_num_rows($res) == 0) {
            echo "<h4>There are no potentially infected customers from this Covid-19 case</h4>";
        } else {
            while ($tuple = mysqli_fetch_assoc($res)) {

                $num = $num + 1;
                echo "<tr>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $tuple['nfc_id'] . "</td>";
                echo "<td>" . $tuple['first_name'] . "</td>";
                echo "<td>" . $tuple['last_name'] . "</td>";
                echo "</tr>";
            }
        }

        $conn->close();

        ?>
    </table>
</body>

</html>