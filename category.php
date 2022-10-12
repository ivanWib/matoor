<?php
require 'utilities.php';


$category = $_GET["category"];

if ($category == "all") {
    $data = query("SELECT * FROM posts");
} else {
    $data = query("SELECT * FROM posts WHERE category = '$category'");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>

<body>

    <a href="category.php?category=all"><button>ALL</button></a>
    <a href="category.php?category=php"><button>PHP</button></a>
    <a href="category.php?category=python"><button>PYTHON</button></a>
    <a href="category.php?category=javascript"><button>JAVASCRIPT</button></a>
    <a href="category.php?category=c++"><button>C++</button></a>
    <a href="category.php?category=c#"><button>C#</button></a>


    <?php foreach ($data as $row) : ?>
    <div>
        <p><?= $row["content"] ?></p>
        <p><?= $row["category"] ?></p>
        <p><?= $row["date"] ?></p>
    </div>
    <?php endforeach; ?>

</body>

</html>