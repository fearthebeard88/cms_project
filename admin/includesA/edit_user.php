<?php 

if(isSet($_GET['edit'])) {
    $id = $_GET['edit'];

    $query="SELECT * FROM users WHERE user_id=$id ";
    $results=mysqli_query($connect, $query);
    while($row=mysqli_fetch_assoc($results)) {
        $id=$row['user_id'];
        $username=$row['username'];
        $password=$row['password'];
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $email=$row['email'];
        $role=$row['role'];
    }
}
// checking for HTTP data POST with key 'create'
// if 'create' is set, grab the other POST data and stick them inside variables
if(isSet($_POST['edit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $date = date('d-m-y');

    // function to move a file from a temporary holding spot, into a more permanent spot
    // move_uploaded_file($post_image_temp, "../../images/$post_image");
    // adding into posts table
    $query = "UPDATE users SET (first_name, last_name, username, email, role, password, date_added) ";
    $query .= "VALUES('{$first_name}', '{$last_name}', '{$username}', '{$email}', '{$role}', '{$password}', now()) ";
    $query .= "WHERE user_id = {$id} ";
    $create = mysqli_query($connect, $query);
    echo "User Created";

    why($create);
    header("Location: users.php");
}


?>

<form action="" method = "post" enctype = "multipart/form-data">

    <div class="form-group">
        <label for="first_name">First Name</label>
            <input type="text" class = "form-control" name = "first_name" value="<?php echo $first_name; ?>">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
            <input type="text" class = "form-control" name = "last_name" value="<?php echo $last_name; ?>">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
            <input type="text" class = "form-control" name = "username" value="<?php echo $username; ?>">
    </div>
    <!-- <div class="form-group">
        <label for="image">User Image</label>
            <input type="file" name = "image">
    </div> -->
    <div class="form-group">
        <label for="email">Email</label>
            <input type="email" class = "form-control" name = "email" value="<?php echo $email; ?>">
    </div>
<div class="form-group">
    <select name = "role" id = "role">
        <option value = "user">Subscriber</option>
        <option value = "admin">Admin</option>
    </select>
</div>
    <div class="form-group">
        <label for="password">Password</label>
            <input type="password" class = "form-control" name = "password">
    </div>
    <div class = "form-group">
        <input class = "btn btn-primary" type = "submit" name = "edit" value = "Edit User">
    </div>

</form>