<?php

if (isSet($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
}

$show_all = "SELECT * FROM posts WHERE post_id = {$post_id} ";
$query = mysqli_query($connect, $show_all);

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

    ?>

<form action="" method = "post" enctype = "multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
            <input value = "<?php echo $title; ?>" type="text" class = "form-control" name = "title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category Id</label>
            <input value = "<?php echo $category; ?>" type="text" class = "form_control" name = "post_category_id">
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
            <input type="file" name = "image">
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