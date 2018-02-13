<?php

    $model = isset($_GET['model']) ? $_GET['model'] : '';
    $model = strtoupper($model);
    require_once( 'shared/connect.php' );

    $sql = "select * from data where model = '$model'";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $available = $sth->fetchAll();
    $count = $sth->rowCount();

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" id="container1">
    <div class="jumbotron">
        <h1>Teletime Barcode Tags</h1>
        <p>Enter Data to generate tag</p>
    </div>
    <div class="input-field">
        <form id="calculator" method="get" action="index.php">
            <div class=" form-group input-group">
                <input id="model" name="model" class="form-control" placeholder="Model" type="text" />
                <!--<span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Scan</button>
                </span>-->
            </div>
            <div class="btn-group d-flex" role="group">
                <button class="btn btn-primary w-100" id="clickMe" type="submit" value="clickme" onclick="code();" >Generate</button>
                <button class="btn btn-dark w-100" id="clickMe2" type="button" value="clickme2" onclick="window.print();" >Print</button>
                <a class="btn btn-success w-100" id="clickMe3" type="button" href="edit.php?model=<?= $model ?>" >Edit</a>
            </div>
        </form>
    </div>
</div>
<hr>
<div>
    <div class="container">
        <?php foreach ($available as $avail ): ?>
            <div id="teletime" class="row">
                <div class="col-2">
                    <img src="img/logo-t.png" class="img-fluid mt-2" height="100" width="100">
                </div>
                <div class="col-6">
                    <svg id="barcode" class="barcode img-fluid"></svg>
                </div>
                <div class="col-4 p-0">
                    <div id="brand" class="mt-3">
                        <?php include 'shared/brand.php'; $brand=$avail['BRAND']; getImage($brand); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-7 mt-4 ">
                    <p id="description" class="mb-0"><?= /*'Description: '.*/$avail['DESCRIPTION'] ?></p>
                </div>
                <div class="col-5 mt-2 p-0">
                    <p id="price1" class="text-right mb-0">Sale Price</p>
                    <p id="price2" class="text-right mt-0 mb-0"><?='$'.$avail['PRICE'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-7 mt-0">
                    <p id="info1">Colour variants may be available<!--<span id="info-in">(ask sales staff)</span>--></p>
                </div>
                <div class="col-5 p-0">
                    <p id="info2" class="text-right">0% Finance (O.A.C)</p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<script>
    <?php
        if($model != ''){
            echo 'JsBarcode("#barcode", "'.$model.'", {
            margin: 0,
            font: "verdana"
            });';

            foreach ($available as $avail ){

                echo 'document.getElementById("model").value = "'.$avail["MODEL"].'";';
            }
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
