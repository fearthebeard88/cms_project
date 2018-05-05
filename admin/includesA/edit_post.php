<form action="" method = "post" enctype = "multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
            <input type="text" class = "form-control" name = "title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category Id</label>
            <input type="text" class = "form_control" name = "post_category_id">
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