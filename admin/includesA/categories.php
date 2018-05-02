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

                       addCat();

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
                            <?php find_all_cat() ?>
                            <?php

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