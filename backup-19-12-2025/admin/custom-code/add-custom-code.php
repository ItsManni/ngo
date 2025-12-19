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
    <title>Add Custom Code - <?= $_ProductName ?> ICS</title>

    <?php
    @session_start();
    include("../include/common-head.php");
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();
    $CenterID = -1;
    if(isset($_SESSION['CenterID'])){
        $CenterID = $_SESSION['CenterID'];
    }
    if(isset($_GET['center']))
    {
        $CenterID = $_GET['center'];
    }
    $CustomCode = new CustomCode($conn);
    $custom_code_details = $CustomCode->GetCustomCodeDetailsbyID(1);



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
                        <div class="page-header">
                            <h1 class="page-title">Add Custom Code </h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Custom Code </li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->

                        <form action="" id="custom_code_form">
                            <div class="row justify-content-center p-5 bg-white">


                                <div class="col-sm-12 col-md-10">
                                    <div class="form-group">
                                        <label class="form-label">Header </label>
                                        <textarea class="form-control w-100" name="HeaderCode" id="HeaderCode"
                                            rows="14"><?php echo $custom_code_details['HeaderCode']; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-10">
                                    <div class="form-group">
                                        <label class="form-label">Body </label>
                                        <textarea class="form-control w-100" name="BodyCode" id="BodyCode"
                                            rows="14"><?php echo $custom_code_details['BodyCode']; ?></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="custom_form_id"
                                    value="<?php echo $custom_code_details['ID'];?>">


                            </div>
                            <div class="row pt-5 pb-5 justify-content-end">
                                <div class="col-md-4 text-end">
                                    <a class="btn btn-success text-white" id="custom_code_form_btn"
                                        onclick="AddCustomCode()">Save</a>
                                </div>
                            </div>
                        </form>


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

        <script src="../project-assets/js/custom-code.js"></script>
        <script src="../project-assets/js/commonjs.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_websiteedit_li").css("display", "block");
            $("#nav_websiteedit_li").addClass("open");
            $("#nav_websiteedit").addClass("active");
            $("#nav_custom_code").addClass("active");
        });
        </script>
</body>

</html>
