<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="trennigraafik,jooksmine,jalutamine">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treeningud</title>
    <link rel="stylesheet" type="text/css" href="table.css" />
    <link rel="stylesheet" type="text/css" href="form.css" />
    <style>
        body {
            background-color: azure;
        }
    </style>
</head>

<body>
    <h1>Statistika</h1>

    
    <table class="parem">
        <col width="10%">
        <col width="20%">
        <col width="20%">
        <col width="20%">
        <caption>Kokkuvõte aprilli treeningutest!</caption>
        <?php

        include("connect.php");
        if (!$db) {
            die('Ühenduse loomine ebaõnnestus!');
        }

        $alad = array();      //alade massiivi
        $rida = 1;
        $sql = "SELECT * FROM trennid GROUP BY ala ORDER BY kuupaev ASC";

        if ($result = mysqli_query($db, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    array_push($alad, $row['ala']);
                    $rida++;  //Kahtlane koht
                }
            } else {
                echo "Kirjeid ei leitud!";
            }
        } else {
            echo "Päring ebaõnnestus!";
        }

        sort($alad);
        //print_r($alad); //alade väljastus kontrolliks
        echo "<table><tr>";
        echo "<th>Nr</th>";
        echo "<th>Ala</th>";
        echo "<th>Aeg minutites</th>";
        echo "<th>Aeg tundides</th>";
        echo "<th>Distants km</th>";
        echo "<th>Kalorikulu</th>";
        echo "</tr>";

        for ($i = 0; $i < sizeof($alad); $i++) {
            $sama_ala = $alad[$i];  //vaadeldav ala

            $sql = "SELECT SUM(min), SUM(dist), SUM(kal) FROM trennid WHERE ala='$sama_ala'";
            if ($result = mysqli_query($db, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . ($i+1) . ".</td>";
                        echo "<td>" . $sama_ala . "</td>";
                        echo "<td>" . $row[0] . "</td>";
                        echo "<td>" . round(($row[0]/60),1 ). "</td>";
                        echo "<td>" . $row[1] . "</td>";
                        echo "<td>" . $row[2] . "</td>";
                        echo "</tr>";
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Kirjeid ei leitud!";
                }
            } else {
                echo "Päring ebaõnnestus!";
            }
        } //While tsükli lõpp

        echo "<table>";
        mysqli_close($db);
        ?>

        <br><br>
        <div class="element">
        <img src="walk.png" alt="Kerge trenn">
    </div>
        <a href="form.php"><button>Lisa treening graafikusse!</button></a>
       
</body>

</html>