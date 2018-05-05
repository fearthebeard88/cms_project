<?php 
function addCat(){
    global $connect;
 if (isSet($_POST['submit'])) {
    $category = $_POST['cat_title'];
    if ($category == "" || empty($category)) {
        echo "Here's how this goes...You fill out the field, THEN click the button...dipshit...";
    } else {
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
    $query = "SELECT * FROM categories ";
    $select_cat = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_assoc($select_cat)) {$cat_title = $row['cat_title'];
              $cat_id = $row['cat_id'];
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
    if (isSet($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete = mysqli_query($connect, $query);
    header("Location: categories.php");
    }
}

function why($result) {
    global $connect;
    if(!$result) {
        die(mysqli_error($connect));
    }
}

function delete_post() {
    global $connect;
    if (isSet($_GET['delete'])) {
        $delete = $_GET['delete'];
    
        $query = "DELETE FROM posts WHERE post_id = {$delete} ";
        $delete_query = mysqli_query($connect, $query);
        header("Location: posts.php");
        echo "Post Deleted";
    }
}
?>