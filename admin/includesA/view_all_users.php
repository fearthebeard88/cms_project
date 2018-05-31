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
$query .= "ORDER BY comment_date DESC ";
$show_all = mysqli_query($connect, $query);
// assigning everything returned from comments into variables
while ($row = mysqli_fetch_assoc($show_all)) {
    $id = $row['comment_id'];
    $author = $row['comment_author'];
    $comment = $row['comment_content'];
    $email = $row['comment_email'];
    $status = $row['comment_status'];
    $response = $row['comment_post_id'];
    $date = $row['comment_date'];
// putting variables into table format 
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$author</td>";
    echo "<td>$comment</td>";
// selecting all from table comments where the comment_id = $id from comments table
// $query = "SELECT * FROM categories WHERE cat_id = {$category} ";
// $select_cat_id = mysqli_query($connect, $query);

// while ($row = mysqli_fetch_assoc($select_cat_id)) {
//     $cat_id = $row['cat_id'];
//     $cat_title = $row['cat_title'];

//     echo "<td>{$cat_title}</td>";
// }

   
    echo "<td>$email</td>";
    echo "<td>$status</td>";

    $query = "SELECT * FROM posts WHERE post_id = $response ";
    $post_id_query = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($post_id_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
                echo "<td><a href = '../../post.php?p_id=$post_id'>$post_title</a></td>";
    }
    
    echo "<td>$date</td>";
    echo "<td><a href = 'comments.php?approve=$id'>Approve</a></td>";
    echo "<td><a href = 'comments.php?unapprove=$id'>Unapprove</a></td>";
    echo "<td><a href = 'comments.php?delete=$id'>Delete</a></td>";
    echo "</tr>";
}
?>
                                </tr>
                            </tbody>
                        </table>

<?php

if (isSet($_GET['delete'])) {
    $id = $_GET['delete'];

$query = "DELETE FROM comments WHERE comment_id = {$id} ";
$delete = mysqli_query($connect, $query);
header("Location: comments.php");
}

if (isSet($_GET['unapprove'])) {
    $id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $id ";
    $unapprove = mysqli_query($connect, $query);
    header("Location: comments.php");
}

if (isSet($_GET['approve'])) {
    $id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $id ";
    $approve = mysqli_query($connect, $query);
    header("Location: comments.php");
}

?>