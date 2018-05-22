<table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comments</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
<?php
// getting everything from table called comments
$query = "SELECT * FROM comments ";
$show_all = mysqli_query($connect, $query);
// assigning everything returned from comments into variables
while ($row = mysqli_fetch_assoc($show_all)) {
    $id = $row['comment_id'];
    $author = $row['comment_author'];
    $comment = $row['comment_content'];
    $email = $row['comment_email'];
    $status = $row['comment_status'];
    $response = $row['comment_post_id'];
    $date = $row['post_date'];
// putting variables into table format 
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$author</td>";
    echo "<td>$comment</td>";
// selecting all from table comments where the comment_id = $id from comments table
$query = "SELECT * FROM categories WHERE cat_id = {$category} ";
$select_cat_id = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($select_cat_id)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<td>{$cat_title}</td>";
}

   
    echo "<td>$email</td>";
    echo "<td>$status</td>";
    echo "<td>$date</td>";
    echo "<td><a href = 'posts.php?source=edit_post&p_id=$id'>Approve</a></td>";
    echo "<td><a href = 'posts.php?source=edit_post&p_id=$id'>Unapprove</a></td>";
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