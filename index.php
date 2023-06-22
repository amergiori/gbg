<?php
    require __DIR__ . "/inc/bootstrap.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>BGB</title>
</head>
<body>
    <div class="">
        <h1 class="">Users Table</h1>
        <button><a href="insertUser.php">Create New User</a></button>
        <table class="">
            <thead>
                <tr>
                    <th class="">Name</th>
                    <th class="">Age</th>
                    <th class="">Country</th>
                    <th class="">Email</th>
                    <th class="">Profile pic</th>
                    <th class="">Flag</th>
                </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
        </table>
        <div class="popup"></div>
    </div>
    <script src="assets/js/index.js"></script>
</body>
</html>