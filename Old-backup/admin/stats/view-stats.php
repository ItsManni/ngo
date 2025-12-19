<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <!-- TITLE -->
    <title>View All PAM - Webomates Partnership Portal</title>
    <?php 
    include("../include/common-head.php");
    require_once('../include/autoloader.inc.php');
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();
    $PAM = new Pam($conn);
    $Pam_details = $PAM->GetPAM($conn);
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
                            <h1 class="page-title">All PAM</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View PAM</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <a href="./add-partner-account-manager" class="btn btn-success">Add PAM</a>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="view-partner-acm">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Campaign</th>
                                                        <th class="wd-15p border-bottom-0">Main Page</th>
                                                        <th class="wd-20p border-bottom-0">Trial Page</th>
                                                        <th class="wd-15p border-bottom-0">Registration </th>
                                                        <!-- <th class="wd-25p border-bottom-0">Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $i=1;
                                                    foreach($Pam_details as $Pam_value)
                                                    {

                                                    $id  = $Pam_value['ID'];
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $Pam_value['Campaign']; ?></td>
                                                    <td><?php echo $Pam_value['CampaignName']; ?></td>
                                                    <td><?php echo $Pam_value['PAM_Email']; ?></td>
                                                    <!-- <td>
                                                            <div class="g-2"> 
                                                                <a href="./update-partner-account-manager" class="btn text-primary btn-sm"  data-bs-toggle="tooltip" data-bs-original-title="Update">
                                                                    <span class="fe fe-edit fs-14"></span>
                                                                </a> 
                                                                <a class="btn text-danger btn-sm" data-bs-toggle="tooltip"  data-bs-original-title="Delete">
                                                                    <span class="fe fe-trash-2 fs-14"></span>
                                                                </a> 
                                                            </div>
                                                     </td> -->

                                                </tr>
                                                <?php
                                                    $i++;
                                                    }
                                                    ?>
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


            <?php
       include("../navigation/right-side-navigation.php");
        ?>

        </div>

        <?php
       include("../include/common-script.php");
        ?>

        <script src="../project-assets/js/partner-acm.js"></script>
</body>

</html>