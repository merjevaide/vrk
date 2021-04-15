<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="trennigraafik,jooksmine,jalutamine">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trennivorm</title>
    <link rel="stylesheet" type="text/css" href="form.css" />



</head>
<body>
   <h2>Treeningute sisestamine</h2> 
   <div class="container">
       <form name="vorm" method="post" action="insert.php" onsubmit="return kontroll()">
       <div class="row">
           <div class="col-20">
               <label>Kuupäev (kuu/päev/aasta)</label>
            </div>
            <div class="col-80">
                <input type="date" name="kuupaevf" min="2021-04-01">
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Mis trenni tegid?</label>
            </div>
            <div class="col-80">
                <input type="radio" name="alaf" value="jooksmine" checked>jooksmine<br>
                <input type="radio" name="alaf" value="jalutamine">jalutamine<br>
                <input type="radio" name="alaf" value="ujumine">ujumine<br>
                <input type="radio" name="alaf" value="muu">muu<br>
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Aeg minutites</label>
            </div>
            <div class="col-80">
                <input type="number" name="minf" min="30" max="300" step="5">
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Distants kilomeetrites</label>
            </div>
            <div class="col-80">
                <input type="number" name="distf" min="0" max="100">
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Sisesta kalorid</label>
            </div>
            <div class="col-80">
                <input type="number" name="kalf" min="100" max="1000">
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Märkused ja kommentaarid</label>
            </div>
            <div class="col-80">
                <textarea id="mark" name="markf" 
                placeholder="Tähelepanekud"></textarea>
            </div>
        </div>
        <div class="row">
            <input type="reset" value="Tühjenda väljad"></input>
            <input type="submit" value="Sisestatud ja tehtud"></input>
        </div>
</form>
</div>
<script>
function kontroll(){  /*Andmete valideerimine */
let kuupaevv = new Date(document.forms["vorm"]["kuupaevf"].value);
let alav=document.forms["vorm"]["alaf"].value;
let minv=document.forms["vorm"]["minf"].value;
let distv=document.forms["vorm"]["distf"].value;
let kalv=document.forms["vorm"]["kalf"].value;

let currentDate = new Date();
//Andmed jäid sisestamata
if(minv==""){
    alert("Aeg jäi sisestamata!");
    return false;
}

}

</script>


</body>

</html>