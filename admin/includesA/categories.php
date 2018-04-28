<?php include "header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Guru-in-training
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                        
                        <?php

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

                        ?>

                            <form action="categories.php" method = "post">
                            
                            <div class="form-group">
                            <label for="cat_title">Add Category</label>
                                <input class = "form-control" type="text" name = "cat_title">
                            </div>
                            <div class="form-group">
                                <input class = "btn btn-primary" type="submit" name = "submit" value = "Add Category">
                            </div>
                            </form>
                            
                           <?php

                            if (isSet($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                include "update_categories.php";
                            }

                            ?>

                        </div>

                        <div class="col-xs-6">

                        <?php

                        $query = "SELECT * FROM categories ";
                        $select_cat = mysqli_query($connect, $query);

                        ?>
                        
                        <table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                            while ($row = mysqli_fetch_assoc($select_cat)) {
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];
                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "<td><a href = 'categories.php?delete={$cat_id}'>Delete</a></td>";
                                echo "<td><a href = 'categories.php?edit={$cat_id}'>Edit</a></td>";
                                echo "</tr>";
                            }
                            
                            

                            if (isSet($_GET['delete'])) {
                                $the_cat_id = $_GET['delete'];
                            $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                            $delete = mysqli_query($connect, $query);
                            header("Location: categories.php");
                            }

                            ?>
                            </tbody>
                        </table>

                        </div>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
   <?php include "footer.php"; ?>