<?php

    $model = isset($_GET['model']) ? $_GET['model'] : '';
    $model = strtoupper($model);

    $modelUpdate = isset($_POST['modelUpdate']) ? $_POST['modelUpdate'] : '';
    $modelUpdate = strtoupper($modelUpdate);

    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    require_once( 'shared/connect.php' );

    $sql = "select * from data where model = '$model'";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $available = $sth->fetchAll();
    $count = $sth->rowCount();

    if ($model != ''){
        foreach ($available as $avail ) {
            $id = $avail["id"];
        }
    }

    if ($modelUpdate != ''){
        $sqlUpdate = "update data set model = '$modelUpdate', description = '$description', price = $price where id = $id";
        $dbh->exec($sqlUpdate);

        $success = 1;
    }

    $dbh=null;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barcode Received</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="JsBarcode.all.min.js"></script>
    <!--<script src="bar.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="style.css">-->
</head>
<body>
<div class="container" id="container1">
    <div class="jumbotron">
        <h1>Teletime Barcode Tags</h1>
        <p>Enter Data to generate tag</p>
    </div>
    <div class="input-field">
        <form id="calculator" method="post" action="edit.php">
            <div class=" form-group input-group">
                <input id="model" name="modelUpdate" class="form-control" placeholder="Model" type="text" />
            </div>
            <div class=" form-group input-group">
                <input id="description" name="description" class="form-control" placeholder="Description" type="text" />
            </div>
            <div class=" form-group input-group">
                <input id="price" name="price" class="form-control" placeholder="Price" type="number" step="any" />
            </div>
            <div class=" form-group input-group">
                <input name="id" value="<?= $id ?>" type="hidden" />
            </div>
            <div class="btn-group d-flex" role="group">
                <button class="btn btn-success w-100" id="clickMe" type="submit" value="clickme" onclick="code();" >Save</button>
                <a class="btn btn-primary w-100" id="clickMe3" type="button" href="index" >Back</a>
            </div>
        </form>
    </div>
</div>
<hr>
<script>
    <?php
        if($model != ''){
            foreach ($available as $avail ){
                $description = $avail["DESCRIPTION"];
                $description = addslashes($description);

                echo 'document.getElementById("model").value = "'.$avail["MODEL"].'";';
                echo 'document.getElementById("description").value = "'. $description.'";';
                echo 'document.getElementById("price").value = "'.$avail["PRICE"].'";';
            }
        }

        if(isset($success) && $success ==1){
            echo 'alert("Update Successful.");';
        }
    ?>
</script>
<script>
    document.addEventListener('keydown', function(event) {
        if( event.keyCode == 13 || event.keyCode == 17 || event.keyCode == 74 )
            event.preventDefault();
    });
</script>

</body>
</html>