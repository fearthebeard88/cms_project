<?php 
// checking for HTTP data POST with key 'create'
// if 'create' is set, grab the other POST data and stick them inside variables
if(isSet($_POST['create'])) {
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];
    $post_date = date('d-m-y');

    // function to move a file from a temporary holding spot, into a more permanent spot
    move_uploaded_file($post_image_temp, "../../images/$post_image");
    // adding into posts table
    $query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_img, post_content, post_tags, post_status) ";
    $query .= "VALUES('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";
    $create = mysqli_query($connect, $query);
    echo "Post Added";

    why($create);
}


?>

<form action="" method = "post" enctype = "multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
            <input type="text" class = "form-control" name = "title">
    </div>
    <div class="form-group">
        <select name = "post_category" id = "post_category">

            <?php
            // select all from table categories
            $query = "SELECT * FROM categories ";
            $select = mysqli_query($connect, $query);

            why($select);
            // assigning values from query into an array and assigning them into variables
            while ($row = mysqli_fetch_assoc($select)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                // drop down menu to hold categories returned from database
                echo "<option value = '{$cat_id}'>{$cat_title}</option>";
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
            <input type="text" class = "form-control" name = "author">
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
            <input type="text" class = "form-control" name = "status">
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
            <input type="file" name = "image">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
            <input type="text" class = "form-control" name = "tags">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
            <textarea class = "form-control" name = "content" id = "" cols = "30" rows = "10"></textarea>
    </div>
    <div class = "form-group">
        <input class = "btn btn-primary" type = "submit" name = "create" value = "Publish Post">
    </div>

</form>