<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="trennigraafik,trennid,tervis">
    <title>Trennigraafik</title>
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>

<body>
    <h1>Minu trennigraafik 2021 aprilliks</h1>
    <p title="Soovitused">Järjekindlaks treenimiseks</p>
    <div class="tooltip">Kuidas treenida?
        <span class="tooltiptext">Tuleb olla järjekindel</span>
    </div>

    <div class="element">
        <table>
            <col width="10%">
            <col width="20%">
            <col width="30%">
            <col width="10%">
            <col width="10%">
            <col width="20%">
            <caption>Sellised tulemused sellel kuul</caption>
    <?php
    include("connect.php");
    if(!$db){die("Ühenduse loomine ebaõnnestus!");}
    $sql="SELECT * FROM trennid ORDER BY kuupaev ASC";
    if($result=mysqli_query($db,$sql)){
        if(mysqli_num_rows($result)>0){
            echo"<tr>";
            echo"<th>Nr</th>";
            echo"<th>Kuupäev</th>";
            echo"<th>Ala</th>";
            echo"<th>Aeg minutites</th>";
            echo"<th>Distants</th>";
            echo"<th>Kalorid</th>";
            echo"</tr>";  //Veergude pealkirjad said väljastatud
            $rida=1;
            //trenniridade väljastamine
            while($row=mysqli_fetch_array($result)){ //VIGA!
                echo"<tr>";
                $kpaev=date_create($row['kuupaev']);
                $kpaevf=date_format($kpaev,"d.n.Y");//eestile sobiv kuupäev
                echo"<td>".$rida.".</td>";
                echo"<td>".$kpaevf."</td>";
                echo"<td>".$row['ala']."</td>";
                echo"<td>".$row['min']."</td>";
                echo"<td>".$row['dist']."</td>";
                echo"<td>".$row['kal']."</td>";
                echo"</tr>";
                $rida++;
            } //Read väljastatud
            echo"</table>";
        } else {echo"Kirjeid ei leitud!";}
    }else{echo"Päring ebaõnnestus!";}
    mysqli_close($db);
    ?><br><br>
    <a href="form.php"><button>Lisa treening!</button></a>
        
    </div>

    <div class="element">
        <img src="walk.png" alt="Kerge trenn">
    </div>
    
</body>

</html>