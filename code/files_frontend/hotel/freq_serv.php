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
                <th>Description</th>
                <th>Number of Visits</th>
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


        $age = $_POST["ageslot"];
        $slot = $_POST["dateslot"];

        $firstage = 0;
        $secondage = 0;

        if ($age == "first") {
            $firstage = 20;
            $secondage = 40;
        } elseif ($age == "second") {
            $firstage = 41;
            $secondage = 60;
        } else {
            $firstage = 61;
            $secondage = 150;
        }

        //ws last month theouroume ton Martio giati einai o teleutaios minas poy exoun bei pelates
        //ws last year theoroume to 2021 diladi to year tou current timestamp

        $quer .= "with temp(service_id, descr, cost) as";
        $quer .= " (select service_id_receives_services, descr, cost";
        $quer .= " from (receives_services inner join customers on receives_services.nfc_id_receives_services = customers.nfc_id)";
        if ($slot == "month") $quer .= " where year(date_of_use) = year(current_timestamp()) and month(date_of_use) = 3 and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) >= " . $firstage . " and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) <= " . $secondage . "),";
        else $quer .= " where year(date_of_use) = year(current_timestamp()) and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) >= " . $firstage . " and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) <= " . $secondage . "),";
        $quer .= " temp2(service_id, descr, cost) as";
        $quer .= " (select distinct service_id, descr, cost";
        $quer .= " from temp)";
        $quer .= " select service_id, descr, cost,";
        $quer .= " (select count(*)";
        $quer .= " from temp";
        $quer .= " where temp2.service_id = temp.service_id) as freq";
        $quer .= " from temp2";
        $quer .= " order by freq desc";

        $res = mysqli_query($conn, $quer);

        $num = 0;

        if (mysqli_num_rows($res) == 0) {
            echo "<h4>There are no uses of services that satisfy the given criteria. Try Again.</h4>";
        } else {
            while ($tuple = mysqli_fetch_assoc($res)) {

                $num = $num + 1;
                echo "<tr>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $tuple['service_id'] . "</td>";
                echo "<td>" . $tuple['descr'] . "</td>";
                echo "<td>" . $tuple['freq'] . "</td>";
                echo "</tr>";
            }
        }

        $conn->close();

        ?>
    </table>
</body>

</html>