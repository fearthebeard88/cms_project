<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/includesA/functions.php"; ?>
<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php
            // if there is a GET request in URL under key p_id, assign it to a variable
            if (isSet($_GET['p_id'])) {
                $post_id = $_GET['p_id'];
            }
        // select all from table posts where post_id(column in database) = $post_id(GET request info)
        $query = "SELECT * FROM posts WHERE post_id = {$post_id} ";
            $select_all_posts_query = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_img = $row['post_img'];
                $post_content = $row['post_content'];
                
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_img; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php } ?>

              <!-- Blog Comments -->

              <?php

              if (isSet($_POST['create_comment'])) {

                  $comment_author = $_POST['comment_author'];
                  $comment_email = $_POST['comment_email'];
                  $comment_content = $_POST['comment_content'];

                  $query = "INSERT INTO comments (comment_post_id, comment_author, comment_status, comment_date, comment_email, comment_content) ";
                  $query .= "VALUES ($post_id, '{$comment_author}', 'unapproved', now(), '{$comment_email}', '{$comment_content}') ";

                  $add_comment = mysqli_query($connect, $query);
                  why($add_comment);

                  $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                  $query .= "WHERE post_id = $post_id ";

                  $update_comment_count = mysqli_query($connect, $query);

              }

              ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action = "" method = "post" role="form">
                    <div class="form-group">
                    <label for = "author">Author</label>
                            <input type = "text" name = "comment_author" class="form-control" rows="3">
                        </div>
                        <div class="form-group">
                        <label for = "email">Email</label>
                            <input type = "email" name = "comment_email" class="form-control" rows="3">
                        </div>
                        <div class="form-group">
                        <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name = "comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name = "create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php

            $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connect, $query);

            why($select_comment_query);

            while ($row = mysqli_fetch_assoc($select_comment_query)) {
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

<?php } ?>

                

                
                    </div>
                </div>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sideBar.php"; ?>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "includes/footer.php"; ?>