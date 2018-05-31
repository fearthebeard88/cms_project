<form action="" method = "post">
    <div class="form-group">
    <label for="cat_title">Edit Category</label>

    <?php
    // if GET key 'edit' is set, assign the value into a variable
    if (isSet($_GET['edit'])) {
        $cat_id = $_GET['edit'];
        // select all from table categories where cat_id = $cat_id
    $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
    $find_cat = mysqli_query($connect, $query);
    // assigning the database values into an array
    while($row = mysqli_fetch_assoc($find_cat)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        ?>
        <input type = "text" class = "form-control" name = "cat_title" value = "<?php
        // if $cat_title is set, echo the value back
            if (isSet($cat_title)) {
        echo $cat_title;    
        } ?>">

        <?php
    }
    } ?>

    <?php 
    // if POST 'update' is set, assign the other POST values into variables
    if (isSet($_POST['update'])) {
        $the_cat_title = $_POST['cat_title'];
    // update database with values from form
    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
    $update_query = mysqli_query($connect, $query);
    }
    

    ?>

    
    </div>
    <div class="form-group">
    <input type = "submit" class = "btn btn-primary" name = "update" value = "Update Category">
    </div>
    </form>