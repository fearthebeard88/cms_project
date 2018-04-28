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
}
?>