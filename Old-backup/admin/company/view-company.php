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
    <title>View All Payment - <?= $_ProductName ?> Portal</title>
    <?php 
    include("../include/common-head.php");
    require_once('../include/autoloader.inc.php');
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $core = new Core();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();

    $CenterID = -1;
    if(isset($_SESSION['CenterID'])){
        $CenterID = $_SESSION['CenterID'];
    }

    $Branch = new Branch($conn);
    $AllBranches = $Branch->GetAllBranch($conn);
    
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
                            <h1 class="page-title">Company Details</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Company Details</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <a href="#" onclick="AddCompanyDetails()" class="btn btn-success">Add Company Details</a>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="Company_details">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Center/Branch</th>
                                                        <th class="wd-15p border-bottom-0">Company Name</th>
                                                        <th class="wd-15p border-bottom-0">Email</th>
                                                        <th class="wd-15p border-bottom-0">Phone Number </th>
                                                        <th class="wd-15p border-bottom-0">GST Number </th>
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

            <div class="modal fade" id="add_company_details">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="CompanyDetailsHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="company_details_form" onsubmit="return false;">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 mb-3">
                                        <label for="recipient-name" class="col-form-label">Center/Branch <span
                                                class="text-danger">*</span></label>
                                        <select class="select2 form-control select2-show-search" name="center_id" id="center_id"
                                            style='width:100%;'>
                                            <option value="">Select Center</option>
                                            <?php
                                            foreach($AllBranches as $Branch_value)
                                            {
                                                if($CenterID == -1 || $CenterID == $Branch_value['ID'])
                                                {
                                            ?>
                                            <option value="<?php echo  $Branch_value['ID']?>">
                                                <?php echo  $Branch_value['BranchName']?></option>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-sm-6 col-12">
                                        <label for="recipient-name" class="col-form-label">Company Name <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="company_name" id="company_name"
                                            Placeholder="Enter Name">
                                    </div>

                                    <div class="mb-3 col-md-6 col-sm-6 col-12">
                                        <label for="recipient-name" class="col-form-label">Company Email <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="company_email" id="company_email"
                                            Placeholder="Enter Email">
                                    </div>

                                    <div class="mb-3 col-md-6 col-sm-6 col-12">
                                        <label for="recipient-name" class="col-form-label">Company Phone Number <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="company_phone_number"
                                            id="company_phone_number" Placeholder="Enter Phone Number">
                                    </div>

                                    <div class="mb-3 col-md-6 col-sm-6 col-12">
                                        <label for="recipient-name" class="col-form-label">Company Alternative Number
                                            <span class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="company_alternative_number"
                                            id="company_alternative_number" Placeholder="Enter Alternative Number">
                                    </div>





                                    <div class="mb-3 col-md-6 col-sm-6 col-12">
                                        <label for="recipient-name" class="col-form-label">Company GSTNumber <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="company_gst_number"
                                            id="company_gst_number" Placeholder="Enter GSTNumber">
                                    </div>

                                    <div class="mb-3 col-md-6 col-sm-6 col-12">
                                        <label for="recipient-name" class="col-form-label">Company Address <span
                                                class="text-danger">*<span></label>
                                        <textarea class="form-control" name="company_address" id="company_address"
                                            Placeholder="Enter Address"></textarea>

                                    </div>

                                    <!-- <div class="mb-3 col-md-6 col-sm-6 col-12">
                                        <label for="recipient-name" class="col-form-label">Company Logo </label>
                                        <input type="file" class="form-control" accept=".png" name="company_logo" id="company_logo" >
                                    </div> -->


                                </div>


                                <input type="hidden" id="form_action" name="form_action" value="add" />
                                <input type="hidden" id="form_id" name="form_id" value="-1" />

                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="addCompanyDetailsBtn"
                                        onclick="AddUpdateCompanyDetailsForm()"></button>
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
        <script src="../project-assets/js/company-details.js"></script>
</body>

</html>