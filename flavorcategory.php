<!doctype html>
<html lang="en">
    <head>
        <title>Flavor Category</title>
        <base href="https://www.mchughdavis.com/nlu/">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="css/nlu.css"> 
    </head>
    <body>
        <div class="container-fluid">
            <?php include 'inc/header.php'; ?>
            <?php include 'inc/menu.php'; ?>
            <div class="row bg-white mx-1">
                <div class="col-12 col-md-8 mb-2">
<?php
    $host = 'philnblanks.ipagemysql.com';
    $db   = 'nlu';
    $user = 'cecile';
    $pass = 'test';

    /*mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);*/
    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli) {
        $searchCatName = $_REQUEST["category_name"];
        $searchCatName = str_replace('_',  ' ',  $searchCatName);

        $query = 'SELECT flavor_name, category_name from category INNER JOIN flavor ON (category.category_id = flavor.category_id) WHERE LOWER(category.category_name) = "' . $searchCatName  . '";';

        $result = $mysqli->query($query );
        if ($result) {
            $first = True;
            foreach ($result as $row) {
                if ($first) {
                    echo  '<h1 display="5">' . $row["category_name"] . '</h1>';
                    echo  '<ul class="flavors text-dark">';
                    $first = false;
                }
               
               $flavorNameForPrettyURL = str_replace(" ", "_",  $row["flavor_name"]);
               $flavorNameForPrettyURL = str_replace("n'", "and",  $flavorNameForPrettyURL);
               $flavorNameForPrettyURL = strtolower($flavorNameForPrettyURL);

                echo '<li><a href="javascript:gotoFlavor(';
                echo '\'' .  $flavorNameForPrettyURL .  '\'' ;
                echo ')">';
                echo  '<small>'  .  $row["flavor_name"] .  '</small>';
                echo '</a></li>';
            }
            echo  "</ul>";
        }
    $mysqli->close();
}
?>
                </div>
                <div class="col-12 col-md-4 bg-white mb-2">
                    <?php include 'inc/quote.php'; ?>
                </div>
            </div>
            <?php include 'inc/footer.php'; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> 
        <script src="js/nlu.js"></script> 
    </body>
</html>