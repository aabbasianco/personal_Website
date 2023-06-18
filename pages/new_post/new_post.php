<link rel="stylesheet" href="../../css/form_style.css">
<link rel="stylesheet" href="../../css/default_style.css">
<!-- Contact -->
<section class="section">

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="title">
            <h3 class="title-text">Create a new post !</h3>
        </div>
        <?php
        ?>
        <form action="new_post.php" method="post">
            <input type="text" name="title" placeholder="Title" class="form-text-box">
            <textarea name="body" cols="30" rows="10" placeholder="Body" class="form-textarea"></textarea>
            <input type="submit" class="btn form-btn">
            <div style="text-align: center;">

                <?php
                include('../../connectDB.php');
                if (!empty($_POST["title"]) && !empty($_POST["body"])) {
                    $title = $_POST["title"];
                    $body = $_POST["body"];
                    if ($checkconnect) {

                        $query = "INSERT INTO minicms.posts(post_title,post_body) VALUES('$title','$body')";
                        // $myquery=mysqli_query($minicms_link,$query);  //  Requires path & query
                        if (mysqli_query($minicms_link, $query) === true) {
                            echo ("<p style='color:green;text-align='center';dir=ltr;'><b>پست شما با عنوان  " . $title .
                                "با موفقیت ذخیره شد" . "</b></p>");
                            // $title = null;
                            // $body = null;
                        } else {
                            echo ("<p style='color:red;text-align='center';'><b>ثبت پست با خطا مواجه شد</b></p>");
                        }
                    }
                }
                ?>
            </div>
        </form>
    </div>

</section>