<!doctype html>
<html lang="en">
    <head>
        <title>Flavors</title>
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
            <div class="row mx-1">
                <div class="col-12 col-md-8 mt-10 mb-2 bg-white">
                    <h1 class="display-5">Flavors</h1>
                    <div class="d-flex p-10 flex-wrap justify-content-evenly text-dark">
<?php
    $host = 'philnblanks.ipagemysql.com';
    $db   = 'nlu';
    $user = 'cecile';
    $pass = 'test';
    
    /*mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);*/
    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli) {
        $result = $mysqli->query("SELECT * FROM category ORDER BY category_id");

        foreach ($result as $row) {
           $catNameForPrettyURL = strtolower(str_replace(" ", "_",  $row["category_name"]));

            echo ('<figure>');
            echo ('<a href="category/' . $catNameForPrettyURL . '">');
            echo ('<img src="img/lightbox.png" class="border border-categorybox"/>');
            echo  ('<figcaption class="text-center small">' . $row["category_name"] . '</figcaption>');
            echo  ('</a>');
            echo  ('</figure>');
        }
        $mysqli->close();
    }
?>
                    </div>
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