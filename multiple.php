<?php
require_once( 'shared/connect.php' );

if (isset($_POST["multiple"])) {
    $sql1 = $_POST["multiple"];
    $sql = str_replace(",", "' OR MODEL = '", $sql1);
    $sql = "SELECT * FROM data WHERE MODEL = '" . $sql . "';";


    $sth = $dbh->prepare($sql);
    $sth->execute();
    $available = $sth->fetchAll();
    $count = $sth->rowCount();

    $dbh = null;


    $i = 1;
}


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
        <p>Enter model numbers seprerated by a ',' (UN55MU6500,UN55MU7000,UN75MU8000)</p>
    </div>
    <div class="input-field">
        <form id="calculator" method="post" action="multiple.php">
            <div class="form-group">
                <input id="model" name="multiple" class="auto form-control" placeholder="Enter model numbers seprerated by a ',' (UN55MU6500,UN55MU7000,UN75MU8000)" type="text" />
                <!--<span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Scan</button>
                </span>-->
            </div>
            <div class="btn-group d-flex" role="group">
                <button class="btn btn-primary w-100" id="generate" type="submit">Generate</button>
                <button class="btn btn-dark w-100"  type="button" onclick="window.print();" >Print</button>
                <a class="btn btn-success w-100" type="button" href="index" >Back</a>
            </div>
        </form>
    </div>
</div>
<hr>
<div class="container" >
    <div class="col-lg-7 offset-lg-3 p-0">
        <strong><p id="count"></p></strong>
    </div>
</div>
<?php if(isset($_POST["multiple"])) : ?>
    <?php foreach ($available as $avail ):
        $model = $avail['MODEL'];
        $model = strtoupper($model); ?>
        <div class="container" id="test">
            <div class="col-print-12 col-lg-7 offset-lg-3 card p-6 pt-2 " >
                <div id="teletime" class="row">
                    <div class="col-2 pl-2 pr-2">
                        <img src="img/logo-t.png" class="img-fluid" height="100" width="100">
                    </div>
                    <div class="col-6">
                        <svg id="barcode<?=$i?>" class="barcode img-fluid"></svg>
                    </div>
                    <div class="col-4 p-0">
                        <div id="brand" class="mt-3 pr-1">
                            <?php include_once 'shared/brand.php'; $brand=$avail['BRAND']; getImage($brand); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7 mt-4 pl-2">
                        <p id="description" class="mb-0"><?= /*'Description: '.*/$avail['DESCRIPTION'] ?></p>
                    </div>
                    <div class="col-5 mt-2 p-0">
                        <p id="price1" class="text-right mb-0 pr-1">Sale Price</p>
                        <p id="price2" class="text-right mt-0 mb-0 pr-1" ><?='$'.floatval($avail['PRICE']) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-0 pl-2">
                        <p id="info1">Colour variants may be available<!--<span id="info-in">(ask sales staff)</span>--></p>
                    </div>
                    <div class="col-6 p-0">
                        <p id="info2" class="text-right pr-1">Ask about 0% Finance (O.A.C)</p>
                    </div>
                </div>
            </div>
        </div>

<script>
    <?php
    if($model != ''){
        echo 'JsBarcode("#barcode'.$i.'", "'.$model.'", {
            margin: 0,
            font: "verdana"
            });';

    }
    $i++;
    ?>

</script>
<?php endforeach ?>
<?php endif ?>
<script>
    /*document.addEventListener('keydown', function(event) {
        if( event.keyCode == 13 || event.keyCode == 17 || event.keyCode == 74 )
            event.preventDefault();
    });*/
</script>
<script>
    <?= 'document.getElementById("model").value = "'.$sql1.'";'; ?>
    <?= 'document.getElementById("count").innerHTML = "Total generated: '.($i-1).'";'; ?>
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function() {

        //autocomplete
        $(".auto").autocomplete({
            source: "search.php",
            minLength: 1
        });

    });
</script>
<script>
    function code1() {

        if(document.getElementById("model").value.toString() === ''){
            window.alert("Enter Model Number");
        }

    }

    function code2() {

        if(document.getElementById("teletime") == null){
            window.confirm("Generate tag to edit");
            return false;
        }

    }
</script>
<script>console.log("Balpreet Punia \nhttps://balpreetpunia.github.io \n705-500-4784");</script>
</body>
</html>
