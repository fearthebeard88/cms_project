<table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
<?php
// getting everything from table called posts
$query = "SELECT * FROM posts ";
$show_all = mysqli_query($connect, $query);
// assigning everything returned from posts into variables
while ($row = mysqli_fetch_assoc($show_all)) {
    $id = $row['post_id'];
    $author = $row['post_author'];
    $title = $row['post_title'];
    $category = $row['post_cat_id'];
    $status = $row['post_status'];
    $image = $row['post_img'];
    $tags = $row['post_tags'];
    $comments = $row['post_comment_count'];
    $date = $row['post_date'];
// putting variables into table format 
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$author</td>";
    echo "<td>$title</td>";
// selecting all from table categories where the cat_id = category from posts table
$query = "SELECT * FROM categories WHERE cat_id = {$category} ";
$select_cat_id = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($select_cat_id)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<td>{$cat_title}</td>";
}

   
    echo "<td>$status</td>";
    echo "<td><img width = '100' src = '../../images/$image'></td>";
    echo "<td>$tags</td>";
    echo "<td>$comments</td>";
    echo "<td>$date</td>";
    echo "<td><a href = 'posts.php?source=edit_post&p_id=$id'>Edit</a></td>";
    echo "<td><a href = 'posts.php?delete=$id'>Delete</a></td>";
    echo "</tr>";
}
?>
                                </tr>
                            </tbody>
                        </table>

<?php

delete_post();

?>