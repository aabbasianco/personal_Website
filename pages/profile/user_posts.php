    <link rel="stylesheet" href="../../css/default_style.css">
    <link rel="stylesheet" href="../../css/user_posts_style.css">
    <section class="section" id="all_posts">

        <!-- Title -->
        <div class="title">
            <h3 class="title-text">Your Posts</h3>
        </div>

        <?php
        include('../../connectDB.php');
        include('../../config.php');

        $posts_select_query = "SELECT * FROM minicms.posts ORDER BY post_id DESC";
        $myquery = mysqli_query($minicms_link, $posts_select_query);  //  Requires path & query



        echo '<div class="all-posts-row">';
        while ($result = mysqli_fetch_assoc($myquery)) {
            if ($result) {
                echo '<form action="../main/edit_post.php" method="get">
                        <input class="form_hiden_input" type="text" name="post_id" value="' . $result["post_id"] . '">
                        <input class="post-btn btn" type="submit" value="' . $result["post_title"] . '">
                </form>';
            }
        }
        echo '</div>';
        ?>
    </section>