<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method = "post">
                    <div class="input-group">
                        <input name = "search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name = "submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!-- form -->
                    <!-- /.input-group -->
                </div>

<?php 
// select all from table categories
$query = "SELECT * FROM categories ";
$selectQuery = mysqli_query($connect, $query);

?>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                           <?php
                           // assigning database entries to associative array
                            while ($row = mysqli_fetch_assoc($selectQuery)) {
                        $cat_title = $row['cat_title'];
                        // using variable keyed to categories to set up a query for HTML
                        $cat_id = $row['cat_id'];
                                echo "<li><a href = 'category.php?category=$cat_id'>{$cat_title}</a></li>"; 
} ?>
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php"; ?>
            </div>

        </div>