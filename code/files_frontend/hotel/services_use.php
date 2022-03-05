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
                <th>Service ID</th>
                <th>Service Description</th>
                <th>Cost</th>
                <th>Date of Use</th>
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


        $mincost = $_POST["min"];
        $maxcost = $_POST["max"];
        $sername = trim($_POST["service"]);
        $sdate = $_POST["startdate"];
        $edate = $_POST["enddate"];


        $andneeded = false;

        $quer = "select service_id_receives_services, descr, cost, date_of_use";
        $quer .= " from receives_services";
        $quer .= " where";

        //elegxw an exoun dothei mincost, maxcost, servicename pou den exoun default times

        if ($mincost != "") {
            if ($andneeded) $quer .= " and";
            $quer .= " cost >= " . $mincost;
            $andneeded = true;
        }

        if ($maxcost != "") {
            if ($andneeded) $quer .= " and";
            $quer .= " cost <= " . $maxcost;
            $andneeded = true;
        }

        if ($sername != "") {
            if ($andneeded) $quer .= " and";
            $quer .= " descr= '" . $sername . "'";
            $andneeded = true;
        }
        if ($andneeded) $quer .= " and";
        $quer .= " date_of_use >= '" . $sdate . " 00:00:00' and date_of_use <= '" . $edate . " 23:59:59'";
        $quer .= " order by date_of_use desc";

        $res = mysqli_query($conn, $quer);

        $num = 0;

        if (mysqli_num_rows($res) == 0) {
            echo "<h4>There are no uses of services that satisfy the given criteria. Try Again.</h4>";
        } else {
            while ($tuple = mysqli_fetch_assoc($res)) {

                $num = $num + 1;
                echo "<tr>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $tuple['service_id_receives_services'] . "</td>";
                echo "<td>" . $tuple['descr'] . "</td>";
                echo "<td>" . $tuple['cost'] . "</td>";
                echo "<td>" . $tuple['date_of_use'] . "</td>";
                echo "</tr>";
            }
        }

        $conn->close();

        ?>
    </table>
</body>

</html>