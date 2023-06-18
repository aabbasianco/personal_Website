<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/login_signup_style.css">
    <link rel="stylesheet" href="../../css/form_style.css">
    <link rel="stylesheet" href="../../css/default_style.css">
</head>

<body>
    <!-- <img class="header-img" src="../pictures/picture_4.jpg" alt="Razer gaming setup"> -->
    <form class="login_signup_form" id="Login" action="signin.php" method="post">
        <div class="div">
            <h2>Sign up</h2>
            <input type="text" class="form-text-box" name="username" placeholder="Username">
            <input type="text" class="form-text-box" name="password" placeholder="Password">
            <input type="text" class="form-text-box" name="reenter-password" placeholder="ReEnter Password">
            <div class="div2">
                <input type="button" class="btn" onclick="login()" value="Login">
                <input type="submit" class="btn" value="Sign up">
            </div>
        </div>

    </form>

    <?php
    include("../../connectDB.php");

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($checkconnect) {

            $query = "SELECT * FROM minicms.users WHERE user_username='$username' AND user_password ='$password' ";
            $myquery = mysqli_query($minicms_link, $query);
            $result = mysqli_fetch_array($myquery);
            if ($result) {
                echo '<script>alert("This User alredy Exist in site ")</script>';
            } else {
                $query = "INSERT INTO minicms.users(user_username,user_password) values('$username','$password')";
                $myquery = mysqli_query($minicms_link, $query);
                if ($myquery) {
                    echo ('<script>alert("User added")</script>');
                    header('location:home.php');
                } else {
                    echo '<script>alert("User Not Add in site")</script>';
                    header('location:signin.php');
                }
            }
        }
    }

    ?>

</body>
<script>
    function login() {
        location.replace("login.php")
    }
</script>

</html>