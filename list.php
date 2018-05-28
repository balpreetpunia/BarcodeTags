<?php

require_once( 'shared/connect.php' );

$sql = "select * from data ORDER BY BRAND";
$sth = $dbh->prepare($sql);
$sth->execute();
$available = $sth->fetchAll();

$dbh=null;

$serial = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barcode Tag Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Teletime Barcode Tag Generator</h1>
        <p>Enter Data to generate tag</p>
    </div>
</div>
<hr>
<div class="container">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search for Model..." title="Type in a model">
    </div>
    <div class="table-responsive-sm">
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Model</th>
                <th>Brand</th>
                <th>Title</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($available as $row ): ?>
            <tr>
                <td><?php echo $serial; $serial++;?></td>
                <td><?= $row['MODEL']?></td>
                <td><?= $row['BRAND']?></td>
                <td><?= $row['TITLE']?></td>
                <td><?= '$'.$row['PRICE']?></td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>