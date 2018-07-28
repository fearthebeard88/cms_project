<table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>To Admin</th>
                                    <th>To Subscriber</th>
                                    <th>Delete</th>
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
    echo "<td>$username</td>";
    echo "<td>$first_name</td>";
    echo "<td>$last_name</td>";
    echo "<td>$email</td>";
    echo "<td>$role</td>";
    echo "<td>$date</td>";
    echo "<td><a href='users.php?change_admin={$id}'>Make Admin</td>";
    echo "<td><a href='users.php?change_sub={$id}'>Make Subscriber</td>";
    echo "<td><a href = 'users.php?delete={$id}'>delete</a></td>";
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

if (isSet($_GET['change_admin'])) {
    $id = $_GET['change_admin'];

    $query = "UPDATE users SET role = 'admin' WHERE user_id = $id ";
    $unapprove = mysqli_query($connect, $query);
    header("Location: users.php");
}

if (isSet($_GET['change_sub'])) {
    $id = $_GET['change_sub'];

    $query = "UPDATE users SET role = 'subscriber' WHERE user_id = $id ";
    $approve = mysqli_query($connect, $query);
    header("Location: users.php");
}

?>