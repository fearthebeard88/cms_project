<?php 
function addCat(){
    global $connect;
    // if POST key 'submit' is set, assign the key 'cat_title' to a variable
 if (isSet($_POST['submit'])) {
    $category = $_POST['cat_title'];
    // if $category is empty, enjoy my sense of humor ;)
    if ($category == "" || empty($category)) {
        echo "Here's how this goes...You fill out the field, THEN click the button...dipshit...";
    } else {
        // otherwise insert into the table categories the new category
        $query = "INSERT INTO categories(cat_title) ";
        $query .= "VALUE('{$category}') ";
        $catAdd = mysqli_query($connect, $query);
        if (!$catAdd) {
            die(mysqli_error($connect));
        }
    }
}
}

function find_all_cat() {
    global $connect;
    // select all from table categories
    $query = "SELECT * FROM categories ";
    $select_cat = mysqli_query($connect, $query);
        // assign the database entries into an array
        while ($row = mysqli_fetch_assoc($select_cat)) {$cat_title = $row['cat_title'];
              $cat_id = $row['cat_id'];
            // putting database entries into html table with edit and delete links
                echo "<tr>";
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "<td><a href = 'categories.php?delete={$cat_id}'>Delete</a></td>";
                echo "<td><a href = 'categories.php?edit={$cat_id}'>Edit</a></td>";
                echo "</tr>";
                        }
}

function delete_cat() {
    global $connect;
    // if there is a GET 'delete' set, assign it to a variable
    if (isSet($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        // delete from the table categories where cat_id = $the_cat_id
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete = mysqli_query($connect, $query);
    // function that reloads the page
    header("Location: categories.php");
    }
}

function why($result) {
    global $connect;
    // if the parameter fails, kills the code and returns error message
    if(!$result) {
        die(mysqli_error($connect));
    }
}

function delete_post() {
    global $connect;
    // if there is a GET key 'delete' set, assign the value to a variable
    if (isSet($_GET['delete'])) {
        $delete = $_GET['delete'];
        // delete from posts where post_id = $delete
        $query = "DELETE FROM posts WHERE post_id = {$delete} ";
        $delete_query = mysqli_query($connect, $query);
        // reloads the page
        header("Location: posts.php");
        echo "Post Deleted";
    }
}
?>