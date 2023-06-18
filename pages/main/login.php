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

    <div class="login-signup-container">
        <form class="login_signup_form" id="Login" action="login.php" method="post" class="form">
            <div class="div">
                <h2>Login</h2>
                <input type="text" class="form-text-box" name="username" placeholder="Username">
                <input type="text" class="form-text-box" name="password" placeholder="Password">
                <div class="div2">
                    <input type="submit" class="btn" value="Login">
                    <input type="button" class="btn" onclick="signup()" value="Sign up">
                </div>
            </div>
        </form>
    </div>

    <?php
    include("../../connectDB.php");
    // include('../config2.php');

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($checkconnect) {

            $query = "SELECT * FROM minicms.users WHERE user_username='$username' AND user_password ='$password' ";
            $myquery = mysqli_query($minicms_link, $query);
            $result = mysqli_fetch_array($myquery);

            if ($result) {
                header('location:new_post.php');
            } else {
                // echo "<script>alert('User Not Found')</script>";
                header('location:login.php');
            }
        }
    }

    ?>

</body>
<script>
    function signup() {
        location.replace("signin.php")
    }
</script>

</html>