<!DOCTYPE HTML>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="form.css" />
    <title>Lisa trenn</title>
    </head>

<body>
    <br>
    <?php

    include("connect.php"); // lisatakse andmebaasiühenduse kirjeldus
    
$query1 = " SELECT COUNT(*) from trennid";
$result = mysqli_query($db, $query1);
//Kirjete arv tabelis
$rows = mysqli_fetch_row($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        $kuupaev = $_POST["kuupaevf"];
        $ala = $_POST["alaf"];
        $min = $_POST["minf"]; // vormil kasutati POST meetodit, siis kasutatakse $_POST 
        $dist = $_POST["distf"];
        $kal = $_POST["kalf"];
        
        $stmt = $db->prepare("INSERT INTO trennid(kuupaev, ala, min, dist,kal) VALUES(?, ?, ?, ?, ?)"); //Fetching all the records with input credentials
        $stmt->bind_param("sssss", $kuupaev, $ala, $min, $dist, $kal); //Where s indicates string type. You can use i-integer, d-double
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close();
        $db->close();

        if ($result > 0) {
            echo("Andmed lisatud"); // suunatakse järgmisele lehele
        } else {
            echo "Midagi läks viltu. Proovi uuesti!";
        }
        ?>
        <br><br>
        <a href="form.php"><button>Trenni lisamine</button></a>
        <a href="sort.php"><button>Kõik treeningud</button></a>
        <a href="stat.php"><button>Alade kokkuvõte</button></a>
        
    <?php
    }
    ?>
</body>

</html>