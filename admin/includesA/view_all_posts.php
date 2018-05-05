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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
<?php

$show_all = "SELECT * FROM posts ";
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

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$author</td>";
    echo "<td>$title</td>";
    echo "<td>$category</td>";
    echo "<td>$status</td>";
    echo "<td><img width = '100' src = '../../images/$image'></td>";
    echo "<td>$tags</td>";
    echo "<td>$comments</td>";
    echo "<td>$date</td>";
    echo "<td><a href = 'posts.php?delete=$id'>Delete</a></td>";
    echo "<td><a href = 'posts.php?edit=$id'>Edit</a></td>";
    echo "</tr>";
}
?>
                                </tr>
                            </tbody>
                        </table>

<?php

delete_post();

?>