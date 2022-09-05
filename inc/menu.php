<div class="row mx-1 mb-3">
    <nav class="navbar navbar-expand-sm navbar-light bg-light border">
        <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown px-10">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown">Capabilities</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" onclick="javascript:alert('Design page not yet implemented.')">Design</a></li>
                            <li><a class="dropdown-item" onclick="javascript:alert('Production page not yet implemented.')">Production</a></li>
                            <li><a class="dropdown-item" onclick="javascript:alert('Certification page not yet implemented.')">Certification</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown px-10">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown">Flavors</a>
                        <ul class="dropdown-menu">
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
            echo '<li><a class="dropdown-item" href="category/' . $catNameForPrettyURL . '">' . $row["category_name"] .  '</a></li>';
        }
        $mysqli->close();
    }
?>
                        </ul>
                    </li>
                    <li class="nav-item px-10">
                        <a class="nav-link" onClick="javascript:alert('About Us page not yet implemented.')">About Us</a>
                    </li>
                    <li class="nav-item px-10">
                        <a class="nav-link" onClick="javascript:alert('Contact Us page not yet implemented.')">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>