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
                            Welcome Oh-<strong>Mighty</strong>-One...
                            <small>Tim</small>
                        </h1>

<?php

if (isSet($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = '';
}

switch($source) {
    case "something" :
    echo "something";
    break;
    default:
    include "add_post.php";
    break;
}

?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
   <?php include "footer.php"; ?>