<?php
session_start();
require_once 'utilities.php';

if (isset($_POST["post"])) {

    if (postingan($_POST) > 0) {
        echo "<script>
                alert('Data telah ditambahkan');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Post</title>
</head>

<body>
    <div class="justify-content-center">
        <h2>Post</h2>
    </div>
    <div class="container">
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="nama-category">Topic</label>
                <select class="form-control" name="category" required>
                    <option value=""> -- Topic -- </option>
                    <option value="php">PHP</option>
                    <option value="python">PYTHON</option>
                    <option value="javascript">JAVASCRIPT</option>
                    <option value="c++">C++</option>
                    <option value="c#">C#</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="nama-content">Comment</label>
                <textarea class="form-control" name="content"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="post">Post</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>