<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andmebaasi tabeli loomine</title>
    <link rel="stylesheet" type="text/css" href="tabel.css" />
    <link rel="stylesheet" type="text/css" href="form.css" />
    <style>
        body {
            background-color: azure;
        }
    </style>
</head>

<body>
<?php
include("connect.php"); // lisatakse andmebaasiühenduse kirjeldus
        
        // Kas ühendus toimib
        if (!$db) {
            die("Ühenduse loomine ei õnnestunud: " . mysqli_connect_error());
        }

$sql="
CREATE TABLE trennid (".
   "id int(3) AUTO_INCREMENT,".
   "kuupaev date,".
   "ala varchar(30),".
   "min int(3),".
   "dist int(2),".
   "kal int(5),".
   "PRIMARY KEY(id));";


   $retval = mysqli_query($db, $sql);
   if(! $retval ) {
       die('Ei õnnestunud!: ' . mysqli_error($db));
    }
    echo "Tabel loodud!\n";
       // SQL 
      $sql = "INSERT INTO trennid (id, kuupaev, ala, min, dist, kal)
       VALUES (1, '2021-02-01','jooksmine', 60, 10,500 );";
       
   if (mysqli_multi_query($db, $sql)) {
       echo "Andmed andmebaasi lisatud";
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($db);
   }
   mysqli_close($db);
?>
</body></html>