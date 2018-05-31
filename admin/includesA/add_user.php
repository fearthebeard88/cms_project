<?php 
// checking for HTTP data POST with key 'create'
// if 'create' is set, grab the other POST data and stick them inside variables
if(isSet($_POST['create'])) {
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
    $query = "INSERT INTO users(first_name, last_name, username, email, role, password, date_added) ";
    $query .= "VALUES('{$first_name}', '{$last_name}', '{$username}', '{$email}', '{$role}', '{$password}', now()) ";
    $create = mysqli_query($connect, $query);
    echo "User Created";

    why($create);
}


?>

<form action="" method = "post" enctype = "multipart/form-data">

    <div class="form-group">
        <label for="first_name">First Name</label>
            <input type="text" class = "form-control" name = "first_name">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
            <input type="text" class = "form-control" name = "last_name">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
            <input type="text" class = "form-control" name = "username">
    </div>
    <!-- <div class="form-group">
        <label for="image">User Image</label>
            <input type="file" name = "image">
    </div> -->
    <div class="form-group">
        <label for="email">Email</label>
            <input type="email" class = "form-control" name = "email">
    </div>
<div class="form-group">
    <select name = "role" id = "role">
        <option value = "user">User</option>
        <option value = "admin">Admin</option>
    </select>
</div>
    <div class="form-group">
        <label for="password">Password</label>
            <input type="password" class = "form-control" name = "password">
    </div>
    <div class = "form-group">
        <input class = "btn btn-primary" type = "submit" name = "create" value = "Create User">
    </div>

</form>