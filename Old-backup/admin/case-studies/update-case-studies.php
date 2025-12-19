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
    <title>Update Case Studies - <?= $_ProductName ?></title>
    <?php
    include("../include/common-head.php");
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $core = new Core();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();

    $CaseID = -1;

    if(isset($_GET['CaseID'])){
        $CaseID= $_GET['CaseID'];
    }

    $CaseStudies = new CaseStudies($conn);
    $case_details_data = $CaseStudies->GetCaseStudiesDetailsbyID($CaseID);

    ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

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
                            <h1 class="page-title">Update Case Studies </h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Case Studies </li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <form id="case_studies_form" onsubmit="return false;">
                            <div class="row row-sm">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Case Studies Details</b></label>
                                        </div>
                                        <div class="card-body">


                                            <div class="row align-items-center">
                                                <div class="mb-3 col-12 col-md-8">
                                                    <label for="recipient-name" class="col-form-label">Case Studies
                                                        Banner <span class="text-danger">* ( 1280px X 720px only jpg, png, webp )<span></label>
                                                    <input type="file" class="form-control" name="CSBanner"
                                                        id="CSBanner" accept="image/png, image/jpg, image/jpeg, image/webp">
                                                    <input type="hidden" name="old_cs_img" id="old_cs_img"
                                                        value='<?php echo $case_details_data['CSBanner'];?>'>
                                                </div>
                                                <div class="mb-0 col-12 col-md-4">
                                                    <img src="../project-assets/admin-media/casestudies/<?php echo $case_details_data['CSBanner']; ?>"
                                                        alt="" width='100px'>
                                                </div>

                                                <div class="mb-3 col-12 col-md-6">
                                                    <label for="recipient-name" class="col-form-label">Case Heading
                                                        <span class="text-danger">*<span></label>
                                                    <input type="text" class="form-control" onkeyup="generateUrl()"
                                                        name="Heading" id="Heading"
                                                        Placeholder="Enter Case Studies Heading"
                                                        value='<?php echo $case_details_data['Heading'];?>'>
                                                </div>

                                                <div class="mb-3 col-12 col-md-6">
                                                    <label for="recipient-name" class="col-form-label">Case URl <span
                                                            class="text-danger">*<span></label>
                                                    <input type="text" readonly class="form-control" name="Url" id="Url"
                                                        Placeholder="Enter Case URl"
                                                        value='<?php echo $case_details_data['Url'];?>'>
                                                </div>

                                                <div class="mb-3 col-12 col-md-6">
                                                    <label for="recipient-name" class="col-form-label">Case Date <span
                                                            class="text-danger">*<span></label>
                                                    <input type="text" class="form-control fc-datepicker" name="CaseDate"
                                                        id="CaseDate" Placeholder="Enter Case Date"
                                                        value='<?php echo $case_details_data['CaseDate'];?>'>
                                                </div>

                                                <div class="mb-3 col-12 col-md-12   ">
                                                    <label for="recipient-name" class="col-form-label">Case Description
                                                        <span class="text-danger">*<span></label>
                                                    <textarea cols="30" rows="4" type="text" class="form-control"
                                                        name="CaseDescription" id="CaseDescription"
                                                        Placeholder="Enter Case Description"><?php echo $case_details_data['CaseDescription'];?></textarea>
                                                </div>

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Case
                                                        Content</label>
                                                    <textarea cols="30" rows="10" type="text"
                                                        class="form-control summernote" name="CaseContent"
                                                        id="CaseContent"
                                                        Placeholder="Enter Case Content"><?php echo $case_details_data['CaseContent'];?></textarea>
                                                </div>


                                            </div>

                                            <input type="hidden" id="form_action" name="form_action" value="update" />
                                            <input type="hidden" id="form_id" name="form_id"
                                                value="<?php echo $case_details_data['ID'];?>" />

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Status :</b></label>
                                        </div>
                                        <div class="card-body">
                                            <select name="Status" id="Status"
                                                class="form-control form-select is-valid state-valid">
                                                <option value="Published"
                                                    <?php echo ($case_details_data['Status'] == 'Published') ? 'selected' : ''; ?>>
                                                    Published</option>
                                                <option value="Draft"
                                                    <?php echo ($case_details_data['Status'] == 'Draft') ? 'selected' : ''; ?>>
                                                    Draft</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="card product_save_col">
                                        <div class="card-header">
                                            <label for="Action"><b>Action</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <button class="btn btn-success text-white mx-3" id="addCaseStudiesBtn"
                                                    onclick="AddUpdateCaseStudiesForm()"><i class="fa fa-floppy-o"></i>
                                                    Save & Update</button>
                                            </div>

                                        </div>
                                    </div>
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
        // include("../include/common-script-v2.php");
        include("../include/common-script-datatables.php");
        ?>
        <script src="../project-assets/js/case-studies.js"></script>

        <!-- DATEPICKER JS -->
        <script src="../theme-assets/plugins/date-picker/date-picker.js"></script>
        <script src="../theme-assets/plugins/date-picker/jquery-ui.js"></script>

        <!-- INTERNAL SUMMERNOTE Editor JS -->
        <script src="../theme-assets/plugins/summernote/summernote1.js"></script>
        <script src="../theme-assets/js/summernote.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_case_studies_li").css("display", "block");
            $("#nav_case_studies_li").addClass("open");
            $("#nav_case_studies").addClass("active");
            $("#nav_all_case_studies").addClass("active");
            $(".fc-datepicker").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                dateFormat: "yy-mm-dd" // Change the format to 2025-01-15
            });
        });
        </script>


</html>
