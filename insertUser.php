<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BGB</title>
</head>
<body>
<h1 class="">Create new user</h1>
    <button><a href="index.php">Users Table</a></button>
    <div class="container">
        <form class="form">
            <div>
                <label for="">Username</label>
                <input class="username" type="text">
            </div>
            <div>
                <label for="">Email</label>
                <input class="email" type="email">
            </div>
            <div>
                <label for="">Password</label>
                <input class="password" type="text">
            </div>
            <div>
                <label for="">Birthday</label>
                <input class="birthdate" type="date">
            </div>
            <div>
                <label for="">URL</label>
                <input class="url" type="url">
            </div>
            <div>
                <label for="">Phone number</label>
                <input class="tel" minlength="10" maxlength="10" type="number">
            </div>
            <button class="form-submit" onclick="submitForm()">Submit</button>
            <span class="error"></span>
        </form>
    </div>
</body>
<script src="assets/js/insertUser.js"></script>
</html>