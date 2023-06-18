<!-- Latest Posts -->
<link rel="stylesheet" href="../../css/default_style.css">
<link rel="stylesheet" href="../../css/latest_posts_style.css">
<section class="section" id="latest-posts">

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="title-div">
            <h3 class="title-text">Latest Posts</h3>
        </div>

        <!-- Latest Posts & Default Database and Tables -->
        <?php
        include('../../connectDB.php');
        include('../../config.php');

        // Checking Database Connection
        if ($checkconnect) {

            // Creating Database & Tables

            // Minicms Database
            $create_database_query = "CREATE DATABASE IF NOT EXISTS minicms";
            if (mysqli_query($mysql_link, $create_database_query)) {

                // Users Table
                $create_users_table_query =
                    "CREATE TABLE IF NOT EXISTS minicms.users(
                    user_id serial PRIMARY KEY,
                    user_username varchar(20) NOT NULL,
                    user_password varchar(20) NOT NULL,
                    user_firstname varchar(30),
                    user_lastname varchar(30),
                    user_email varchar(40),
                    user_accesslevel ENUM('owner','admin','public') NOT NULL
                    -- FOREIGN KEY (user_id) REFERENCES admins(user_id)) ENGINE=INNODB;
                    )";
                mysqli_query($mysql_link, $create_users_table_query);

                // Default Owner
                $check_default_owner_query =
                    "SELECT * FROM minicms.users WHERE user_username = 'abolfazl'";

                $check_default_owner_query_result =
                    mysqli_query($mysql_link, $check_default_owner_query);

                if (!mysqli_fetch_array($check_default_owner_query_result)) {
                    $insert_default_admin_query =
                        "INSERT INTO minicms.users(user_username, user_password, user_accesslevel) 
                        VALUES ('abolfazl', 123, 'owner')";
                    mysqli_query($mysql_link, $insert_default_admin_query);
                }

                // Admins Table
                // $create_admin_table_query =
                //     "CREATE TABLE IF NOT EXISTS minicms.admins(
                //     user_id BIGINT(20) PRIMARY KEY
                //     )";
                // mysqli_query($mysql_link, $create_admin_table_query);

                // Posts Table
                $create_posts_table_query =
                    "CREATE TABLE IF NOT EXISTS minicms.posts(
                    post_id serial PRIMARY KEY,
                    post_title varchar(20),
                    post_body text,
                    post_img text
                    )";
                mysqli_query($mysql_link, $create_posts_table_query);

                // Comments Table
                $create_comments_table_query =
                    "CREATE TABLE IF NOT EXISTS minicms.comments(
                    comment_id serial PRIMARY KEY,
                    comment_post_id BIGINT(20),
                    comment_author varchar(30),
                    comment_author_email varchar(30)
                    )";
                mysqli_query($mysql_link, $create_comments_table_query);

                // Links Table
                $create_links_table_query =
                    "CREATE TABLE IF NOT EXISTS minicms.links(
                    link_id serial PRIMARY KEY,
                    link_url varchar(255),
                    link_name varchar(255),
                    link_image varchar(255)
                    )";
                mysqli_query($mysql_link, $create_links_table_query);

                // Latest Posts Selection Query
                $latest_posts_select_query = "SELECT * FROM minicms.posts ORDER BY post_id DESC LIMIT 8";
                $myquery = mysqli_query($mysql_link, $latest_posts_select_query);

                // Latest Posts
                echo '<div class="latest-posts-row">';
                // $result=mysqli_fetch_array($myquery);
                while ($result = mysqli_fetch_assoc($myquery)) {
                    // if ($result) {
                    echo '  <div class="post-card">';
                    echo '<h1>' . $result["post_title"] . '</h1>';
                    echo '<hr>';
                    echo '<p>' . $result["post_body"] . '</p>';
                    echo '  </div>';
                    // } else {
                    //     echo 'there is no post to show...';
                    // }
                }
                echo '</div>';
            }
        }
        ?>

    </div>
</section>