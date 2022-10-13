<?php
require 'utilities.php';

if (isset($_POST["submit"])) {
    forgot_password($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post">
        <label for="email;">Masukan Email</label>
        <input type="text" name="email" id="email">
        <label for="pass">Password Baru</label>
        <input type="password" name="password" id="pass">
        <button type="submit" name="submit">Submit</button>
    </form>

</body>

</html>