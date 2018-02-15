<?php
require_once( 'shared/connect.php' );

require_once( 'multipleSql.php' );
$sth = $dbh->prepare($sql);
$sth->execute();
$available = $sth->fetchAll();
$count = $sth->rowCount();

$dbh=null;


$i = 1;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barcode Tag Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="JsBarcode.all.min.js"></script>
    <!--<script src="bar.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="container" id="container1">
    <div class="jumbotron">
        <h1>Teletime Barcode Tag Generator</h1>
        <p>Enter Data to generate tag</p>
    </div>
    <div class="input-field">
        <form id="calculator" method="get" action="index.php">
            <div class="form-group">
                <input id="model" name="model" class="auto form-control" placeholder="Model" type="text" />
                <!--<span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Scan</button>
                </span>-->
            </div>
            <div class="btn-group d-flex" role="group">
                <button class="btn btn-primary w-100" id="generate" onclick="code1();" type="submit">Generate</button>
                <button class="btn btn-dark w-100"  type="button" onclick="window.print();" >Print</button>
                <a class="btn btn-success w-50"  type="button" id="edit" onclick="return code2();" href="edit?model=<?= $model ?>" >Edit</a>
                <a class="btn btn-success w-50"  type="button" href="new" >New</a>
            </div>
        </form>
    </div>
</div>