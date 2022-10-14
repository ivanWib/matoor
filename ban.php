<?php

require 'utilities.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $user_detail = query("SELECT * FROM users WHERE id_user = $id");

    if ($user_detail[0]["status"] == "admin") {
        echo "<script>
        alert('You cannot ban an admin!');
        document.location.href = 'profile.php?id=$id';
        </script>";
    } else {
        if ($user_detail[0]['status'] == 'active') {
            $query = "UPDATE users SET status = 'banned' WHERE id_user = $id";
            mysqli_query($connect, $query);
            echo "<script>
            alert('User has been banned!');
            document.location.href = 'profile.php?id=$id';
            </script>";
            // header('Location: profile.php?id=' . $id);
        } else if ($user_detail[0]['status'] == 'banned') {
            $query = "UPDATE users SET status = 'active' WHERE id_user = $id";
            mysqli_query($connect, $query);
            echo "<script>
            alert('User has been unbanned!');
            document.location.href = 'profile.php?id=$id';
            </script>";
            // header('Location: profile.php?id=' . $id);
        }
    }
}
?>



// $data = query("SELECT * FROM users WHERE id_user = $id")[0];

// $query = "UPDATE users SET status = 'banned' WHERE id_user = $id";
// mysqli_query($connect, $query);
// header('Location: profile.php' . '?id=' . $id);



// if ($data['status'] == 'active') {
// $query = "UPDATE users SET status = 'banned' WHERE id_user = $id";
// mysqli_query($connect, $query);
// header('Location: profile.php');
// } else {
// $query = "UPDATE users SET status = 'active' WHERE id_user = $id";
// mysqli_query($connect, $query);
// header('Location: profile.php');
// }