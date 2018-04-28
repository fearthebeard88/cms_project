<form action="" method = "post">
                            <div class="form-group">
                            <label for="cat_title">Edit Category</label>

                            <?php
                            if (isSet($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                            $find_cat = mysqli_query($connect, $query);
                            
                            while($row = mysqli_fetch_assoc($find_cat)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                ?>
                                <input type = "text" class = "form-control" name = "cat_title" value = "<?php if (isSet($cat_title)) {
                                echo $cat_title;    
                                } ?>">

                                <?php
                            }
                            } ?>

                            <?php 

                            if (isSet($_POST['update'])) {
                                $the_cat_title = $_POST['cat_title'];
                            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                            $update_query = mysqli_query($connect, $query);
                            }
                            

                            ?>

                            
                            </div>
                            <div class="form-group">
                            <input type = "submit" class = "btn btn-primary" name = "update" value = "Update Category">
                            </div>
                            </form>