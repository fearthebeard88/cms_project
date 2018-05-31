<table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
<?php
// getting everything from table called comments
$query = "SELECT * FROM users ";

$show_all = mysqli_query($connect, $query);
// assigning everything returned from comments into variables
while ($row = mysqli_fetch_assoc($show_all)) {
    $id = $row['user_id'];
    $username = $row['username'];
    $email = $row['email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $role = $row['role'];
    $date = $row['date_added'];
    $password = $row['password'];
    $image = $row['user_img'];
// putting variables into table format 
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$username</td>";
    echo "<td>$first_name</td>";
    echo "<td>$last_name</td>";
    echo "<td>$email</td>";
    echo "<td>$role</td>";
    echo "<td>$date</td>";
    echo "<td><a href = 'users.php?delete={$id}'>Delete</a></td>";
// selecting all from table comments where the comment_id = $id from comments table
// $query = "SELECT * FROM categories WHERE cat_id = {$category} ";
// $select_cat_id = mysqli_query($connect, $query);

// while ($row = mysqli_fetch_assoc($select_cat_id)) {
//     $cat_id = $row['cat_id'];
//     $cat_title = $row['cat_title'];

//     echo "<td>{$cat_title}</td>";
// }
}
?>
                                </tr>
                            </tbody>
                        </table>

<?php

if (isSet($_GET['delete'])) {
    $id = $_GET['delete'];

$query = "DELETE FROM users WHERE user_id = {$id} ";
$delete = mysqli_query($connect, $query);
header("Location: users.php");
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