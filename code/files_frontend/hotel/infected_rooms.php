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
                <th>Room ID</th>
                <th>Room Name</th>
                <th>Description</th>
                <th>Entrance Time and Date</th>
                <th>Exit Time and Date</th>
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

        //pairnoume to nfc kai typwnoume ta dwmatia poy pige (an yparxoun)
        $nfc = $_POST["nfc_id"];
        $quer = "select room_id_visits, room_name, descr, in_date_time, out_date_time";
        $quer .= " from visits inner join rooms on visits.room_id_visits = rooms.room_id";
        $quer .= " where nfc_id_visits = " . $nfc;
        $quer .= " order by in_date_time desc;";

        $res = mysqli_query($conn, $quer);

        $num = 0;

        if (mysqli_num_rows($res) == 0) {
            echo "<h4>This customer has not visited any rooms yet</h4>";
        } else {
            while ($visit = mysqli_fetch_assoc($res)) {

                $num = $num + 1;
                echo "<tr>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $visit['room_id_visits'] . "</td>";
                echo "<td>" . $visit['room_name'] . "</td>";
                echo "<td>" . $visit['descr'] . "</td>";
                echo "<td>" . $visit['in_date_time'] . "</td>";
                echo "<td>" . $visit['out_date_time'] . "</td>";
                echo "</tr>";
            }
        }

        $conn->close();

        ?>
    </table>
</body>

</html>