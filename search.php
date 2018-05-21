<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

  // if POST 'submit' is set, assign POST 'search' to a variable
if (isSet($_POST['submit'])) {
   $search = strtolower($_POST['search']); 

// select all from table posts where post_tags contain the pattern held by $search.  the % looks for patterns anywhere in the value.
   $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
   $searchQuery = mysqli_query($connect, $query);
// if the query from the database fails, kills the code
   if (!$searchQuery) {
       die (mysqli_error($connect));
   }
   // returns the number of rows returned by the query and assigns it to a variable
   $count = mysqli_num_rows($searchQuery);
   if ($count == 0) {
       // if there are no rows returned, enjoy my sense of humor again ;)
       echo "<h1>NO RESULTS FOR YOU!!!</h1>";
   } else {
    // assigns the rows returned by query into array
    while ($row = mysqli_fetch_assoc($searchQuery)) {
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
    <?php } 
   }
}

?>

                <!-- Second Blog Post -->
                <!-- <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->

                <!-- Third Blog Post -->
                <!-- <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> 

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sideBar.php"; ?>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "includes/footer.php"; ?>