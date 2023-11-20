<?php

session_set_cookie_params(3600);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<body>
    <div class="container-fluid">
        <div class="row bg-light text-dark p-3">
            <div class="col-sm-6">
                <h3>BuilderStorm Learning</h3>
            </div>

            <div class="col-sm-6 text-end">
                <a href="../"><button class="btn btn-dark">Logout</button></a>
            </div>
        </div>
    </div>
</body>

</html>