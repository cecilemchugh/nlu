<?php
    $host = 'philnblanks.ipagemysql.com';
    $db   = 'nlu';
    $user = 'cecile';
    $pass = 'test';

    $errors = [];
    $data = [];

    if (empty($errors)) {
        $mysqli = new mysqli($host, $user, $pass, $db);

        if($mysqli->connect_errno ) {
            $errors['sql'] = $mysqli->error;
        }
        else if ($mysqli) {
            $query = 'INSERT INTO quote(name, email, capability, comments, newsletter) VALUES("' . $_POST["name"] . '", "' . 
            $_POST["email"] . '", "' . 
            $_POST["capability"] . '", "' . 
            $_POST["comments"] . '", "' . 
            isset($_POST["newsletter"]) . '");';
            $result = $mysqli->query($query);

            if ($mysqli->errno) {
                $errors['sql'] = $mysqli->error;
            }
  
            $mysqli->close();
        }
    }

    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors'] = $errors;
    } else {
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    echo json_encode($data);
?>