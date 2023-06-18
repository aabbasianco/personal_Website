<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Style -->
    <link rel="stylesheet" href="../../css/default_style.css">
    <link rel="stylesheet" href="../../css/form_style.css">
    <title>Document</title>
</head>

<body>

    <?php
    // Header
    include('../default/navbar.php');
    // include('default/header.php');
    ?>

    <!-- Contact -->
    <section class="section">

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="title-div">
                <h3 class="title-text">Edit Post</h3>
            </div>

            <?php
            include('../../connectDB.php');
            if (isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];

                if ($checkconnect) {
                    $myquery = "SELECT * FROM minicms.posts WHERE post_id='$post_id'";
                    $get_result = mysqli_query($minicms_link, $myquery);
                    $get_result = mysqli_fetch_array($get_result);

                    echo (' <form action="./edit_post.php" method="post" class="form">
                            <input type="text" name="title" value="' . $get_result['post_title'] . '" class="form-text-box">
                            <textarea name="body" cols="30" rows="10" class="form-textarea" >' . $get_result['post_body'] . '</textarea>
                        <input class="form_hiden_input" type="text" name="post_id" value="' . $get_result["post_id"] . '">
                        <input type="submit" class="btn form-btn">
                            </form>
                    ');
                }
            }

            if (isset($_POST['title']) && isset($_POST['body'])) {
                $post_id = $_POST['post_id'];
                $post_title = $_POST['title'];
                $post_body = $_POST['body'];

                if ($checkconnect) {
                    $myquery = "UPDATE posts SET post_title='$post_title',  post_body='$post_body' WHERE post_id='$post_id'";
                    $set_result = mysqli_query($minicms_link, $myquery);
                    if ($set_result) {
                        // echo "پست شما با موفقیت آپدیت شد";
                        echo ('<script>alert("Your post has been changed successfully")</script>');
                        echo '<script>location.replace("home.php")</script>';
                    }
                }
            }
            ?>
        </div>

    </section>

    <?php
    include('../default/contact_us.php');
    include('../default/footer.php');
    ?>
</body>

</html>