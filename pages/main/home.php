<?php
session_start();
?>

<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php
    include('../default/navbar.php');
    include('../home/def_header.php');
    include('../home/latest_posts.php');
    include('../default/contact_us.php');
    include('../default/footer.php');

    // if (isset($_SESSION["x"])) {
    //     $_SESSION["x"]++;
    // } else {
    //     $_SESSION["x"] = 0;
    // }
    

    // session_destroy();
    // session_unset();
    // unset($_SESSION["x"]);

    ?>
</body>

</html>