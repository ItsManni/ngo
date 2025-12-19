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
    <title>View All Company - <?= $_ProductName ?></title>
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
        ?>

            <?php
       include("../navigation/side-navigation.php");
        ?>

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">All Company</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Company</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <a href="#" onclick="AddCompany()" class="btn btn-success">Add Company</a>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="view-company">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Company Name</th>
                                                        <th class="wd-15p border-bottom-0">Company Email/Phone</th>
                                                        <th class="wd-15p border-bottom-0">Company GST</th>
                                                        <th class="wd-15p border-bottom-0">Reset Password </th>
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <div class="g-2"> <a href="#" onclick="UpdateSubAdmin()"
                                                                    class="btn text-primary btn-sm"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-original-title="Update"><span
                                                                        class="fe fe-edit fs-14"></span></a> <a
                                                                    class="btn text-danger btn-sm"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-original-title="Delete"><span
                                                                        class="fe fe-trash-2 fs-14"></span></a> </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
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

            <div class="modal fade" id="add_company">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="CompanyHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="company_form" onsubmit="return false;">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                         <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Company Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_name" id="company_name"
                                                Placeholder="Enter Company Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Company Email <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_email" id="company_email"
                                                Placeholder="Enter Company Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Company Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_phone_number" id="company_phone_number"
                                                Placeholder="Enter Company Phone Number">
                                        </div>
                                    </div>

                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Company Alternate Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_alternate_number" id="company_alternate_number"
                                                Placeholder="Enter Company Alternate Number">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Company GST <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_gst" id="company_gst"
                                                Placeholder="Enter Company GST">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Company Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_username" id="company_username"
                                                Placeholder="Enter Company Username">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Company Password <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_password" id="company_password"
                                                Placeholder="Enter Company Password">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="mt-5 text-center">
                                    <a class="btn btn-success text-white" id="addUpdateBtn"
                                        onclick="AddUpdateSubAdmin()"></a>
                                    <!-- <a href="#"  class="btn btn-success">Submit</a> -->
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
       include("../include/common-script.php");
        ?>

        <script src="../project-assets/js/company.js"></script>
</body>

</html>