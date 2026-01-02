<?php

@session_start();

require_once('../include/autoloader.inc.php');

$conf = new Conf();

$_ProductName = $conf->_ProductName;

$_ProductLogo = $conf->_ProductLogo;

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta name="description" content="">

    <meta name="author" content="">

    <meta name="keywords" content="">

    <!-- TITLE -->

    <title>View All Testimonial - <?= $_ProductName ?></title>

    <?php

    include("../include/common-head.php");

    $dbh = new Dbh();

    $conn = $dbh->_connectodb();

    $core = new Core();

    $authentication = new Authentication($conn);

    $UserType = $authentication->SessionCheck();



    ?>

</head>



<body class="app sidebar-mini ltr light-mode">

    <div class="page">

        <div class="page-main">

            <?php

                include("../navigation/top-header.php");

                include("../navigation/side-navigation.php");

            ?>
            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        <!-- PAGE-HEADER -->
                        <div class="page-header mb-3">
                            <h1 class="page-title">All Testimonial</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Testimonial</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <span onclick="AddTestimonial()" class="btn btn-success">Add Testimonial</span>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_testimonial">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Name</th>
                                                        <th class="wd-15p border-bottom-0">Image</th>
                                                        <th class="wd-15p border-bottom-0">Description</th>
                                                        <th class="wd-15p border-bottom-0">Approval Status</th>
                                                        <th class="wd-15p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->
            <!-- start add modal  -->
            <div class="modal fade" id="add_testimonial">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="TestimonialHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="testimonial_form" onsubmit="return false;">
                                <div class="row">
                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">User Image <span
                                                class="text-danger">*<span></label>
                                        <input type="file" class="form-control" name="UserImage" id="UserImage">
                                        <!-- <input type="hidden" name="old_user_img" id="old_user_img"> -->
                                        <span class='text-danger' id='old_user_img'></span>
                                    </div>
                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Name <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="Name"
                                            id="Name" Placeholder="Enter Name">
                                    </div>
                                    <div class="mb-3 col-12 col-md-6">

                                        <label for="recipient-name" class="col-form-label">Star Rating <span

                                                class="text-danger">*<span></label>

                                        <select name="StarRating" id="StarRating" class="form-control">

                                            <option value="1">1</option>

                                            <option value="2">2</option>

                                            <option value="3">3</option>

                                            <option value="4">4</option>

                                            <option value="5">5</option>

                                        </select>

                                    </div>



                                    <div class="mb-3 col-12 col-md-12   ">

                                        <label for="recipient-name" class="col-form-label"> Description <span

                                                class="text-danger">*<span></label>

                                        <textarea rows='5' class="form-control" name="Description"

                                            id="Description" Placeholder="Enter Description"></textarea>

                                    </div>





                                </div>



                                <input type="hidden" id="form_action" name="form_action" value="add" />

                                <input type="hidden" id="form_id" name="form_id" value="-1" />



                                <div class="mt-5 text-center">

                                    <button class="btn btn-success text-white" id="addTestimonialBtn"

                                        onclick="AddUpdateTestimonialForm()"></button>

                                </div>





                            </form>

                        </div>

                    </div>

                </div>

            </div>





            <!-- End End modal  -->





            <?php

       include("../navigation/right-side-navigation.php");

        ?>



        </div>



        <?php

        //include("../include/common-script.php");

        include("../include/common-script-v2.php");

        include("../include/common-script-datatables.php");

        ?>

        <script src="../project-assets/js/testimonial.js"></script>

        <script type="text/javascript">

        $(document).ready(function() {

            $("#nav_testimonial").addClass("active");

        });

        </script>



</html>

