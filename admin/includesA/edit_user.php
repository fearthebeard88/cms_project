<?php
// if GET request key p_id is set, assign it to a variable
if (isSet($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
}
// select all from table posts where post_id = $post_id
$show_all = "SELECT * FROM posts WHERE post_id = {$post_id} ";
$query = mysqli_query($connect, $show_all);
// assigning database values into variables
while ($row = mysqli_fetch_assoc($query)) {
    $id = $row['post_id'];
    $author = $row['post_author'];
    $title = $row['post_title'];
    $category = $row['post_cat_id'];
    $status = $row['post_status'];
    $image = $row['post_img'];
    $tags = $row['post_tags'];
    $comments = $row['post_comment_count'];
    $date = $row['post_date'];
    $content = $row['post_content'];
}
// if submit button named create is POSTed, run query to select all from table posts where post_id = $post_id
if (isSet($_POST['create'])) {
$query = "SELECT * FROM posts WHERE post_id = {$post_id} ";
// assigning values posted from form into variables
$post_title = $_POST['title'];
$post_author = $_POST['author'];
$post_category_id = $_POST['post_category'];
$post_status = $_POST['status'];
$post_image = $_FILES['image']['name'];
$post_image_temp = $_FILES['image']['tmp_name'];
$post_tags = $_POST['tags'];
$post_content = $_POST['content'];
$post_date = date('d-m-y');
$post_comment_count = 4;
// moving file from temp position into permanent position
move_uploaded_file($post_image_temp, "../../images/$post_image");
// if there is no file, return the one from the database
if (empty($post_image)) {
    $query = "SELECT * FROM posts WHERE post_id = $post_id ";

    $select_img = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($select_img)) {
        $post_image = $row['post_img'];
    }
}
// updating database with new values from form
$query = "UPDATE posts SET ";
$query .= "post_title = '{$post_title}', ";
$query .= "post_author = '{$post_author}', ";
$query .= "post_cat_id = '{$post_category_id}', ";
$query .= "post_status = '{$post_status}', ";
$query .= "post_date = '{$post_date}', ";
$query .= "post_tags = '{$post_tags}', ";
$query .= "post_content = '{$post_content}', ";
$query .= "post_img = '{$post_image}' ";
$query .= "WHERE post_id = {$post_id} ";

$update = mysqli_query($connect, $query);

why($update);
}

    ?>

<form action="" method = "post" enctype = "multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
            <input value = "<?php echo $title; ?>" type="text" class = "form-control" name = "title">
    </div>
    <div class="form-group">
        <select name = "post_category" id = "post_category">

            <?php
            // select all from table categories
            $query = "SELECT * FROM categories ";
            $select = mysqli_query($connect, $query);

            why($select);
            // assigning database entries to an array
            while ($row = mysqli_fetch_assoc($select)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                // drop down menu for categories
                echo "<option value = '{$cat_id}'>{$cat_title}</option>";
            }
            // form is pre loaded with current posts from database
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
            <input value = "<?php echo $author; ?>" type="text" class = "form-control" name = "author">
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
            <input value = "<?php echo $status; ?>" type="text" class = "form-control" name = "status">
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type = "file" name = "image">
            <img name = "image" width = "100" src="../../images/<?php echo $image; ?>" alt="">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
            <input value = "<?php echo $tags; ?>" type="text" class = "form-control" name = "tags">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
            <textarea class = "form-control" name = "content" id = "" cols = "30" rows = "10"><?php echo $content; ?></textarea>
    </div>
    <div class = "form-group">
        <input class = "btn btn-primary" type = "submit" name = "create" value = "Publish Post">
    </div>

</form>

<div class="form-group">
        <select name = "role" id = "role">

            <?php
            // select all from table categories
            $query = "SELECT * FROM users ";
            $select = mysqli_query($connect, $query);

            why($select);
            // assigning values from query into an array and assigning them into variables
            while ($row = mysqli_fetch_assoc($select)) {
                $user_id = $row['user_id'];
                $role = $row['role'];
                // drop down menu to hold categories returned from database
                echo "<option value = '{$user_id}'>{$role}</option>";
            }

            ?>
        </select>
    </div>