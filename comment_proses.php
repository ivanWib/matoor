<?php
session_start();
require 'utilities.php';

if (isset($_POST["comment"])) {
    if (!isset($_SESSION["login"])) {
        echo "<script>
        alert('Login Dulu Brooo');
        document.location.href = 'index.php';
        </script>";
    } else if ($_POST["content"] === "") {
        
    } else if (comment($_POST) > 0) {
        
    } else {
        echo mysqli_error($connect);
    }

    header("Location: comment.php" . "?id=" . $_POST["post_id"]);
}
?>
