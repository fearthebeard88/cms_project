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
                        
                            <form action="">
                            
                            <div class="form-group">
                            <label for="cat_title">Add Category</label>
                                <input class = "form-control" type="text" name = "cat_title">
                            </div>
                            <div class="form-group">
                                <input class = "btn btn-primary" type="submit" name = "submit" value = "Add Category">
                            </div>
                            </form>

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