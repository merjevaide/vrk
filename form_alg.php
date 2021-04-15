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
                <input type="date" name="kuupaevf">
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Mis trenni tegid?</label>
            </div>
            <div class="col-80">
                
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Aeg minutites</label>
            </div>
            <div class="col-80">
                <input type="number">
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Distants kilomeetrites</label>
            </div>
            <div class="col-80">
                <input type="number">
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Sisesta kalorid</label>
            </div>
            <div class="col-80">
                <input type="number" >
            </div>
        </div>
        <div class="row">
           <div class="col-20">
               <label>Märkused ja kommentaarid</label>
            </div>
            <div class="col-80">
                <textarea id="mark"></textarea>
            </div>
        </div>
        <div class="row">
            <input type="reset" value="Tühjenda väljad"></input>
            <input type="submit" value="Sisestatud ja tehtud"></input>
        </div>
</form>
</div>
</body>

</html>