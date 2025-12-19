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


    <title>Dashboard - <?= $_ProductName ?> Portal</title>


    <?php


        include("../include/common-head.php");


        require_once('../include/autoloader.inc.php');


        $dbh = new Dbh();


        $conn = $dbh->_connectodb();


        $session = new Session($conn);


        $UserType = $session->SessionCheck_redirect();


        $CenterID = -1;


        if(isset($_SESSION['CenterID'])){


            $CenterID = $_SESSION['CenterID'];


        }





        $User_ID = '';


        if(isset($_SESSION['UserID'])){


        $User_ID = $_SESSION['UserID'];


        }








        $navigation = new Navigation();


        $navigation->setNavigation($_SESSION['pp_UserType']);





    ?>





</head>





<body class="app sidebar-mini ltr light-mode">


    <div class="page">


        <div class="page-main">





            <?php


       include("../navigation/top-header.php");


       $dashboard = new Dashboard($conn);





        if($UserType == "System Admin")


        {


            $stats_array = $dashboard->GetAdminDashboardStats("1");


        }


        include("../navigation/side-navigation.php");


        ?>





            <!--app-content open-->


            <div class="main-content app-content mt-0">


                <div class="side-app">





                    <!-- CONTAINER -->


                    <div class="main-container container-fluid">





                        <!-- PAGE-HEADER -->


                        <div class="page-header">


                            <!-- <h1 class="page-title">Product Dashboard</h1> -->


                            <div>


                                <ol class="breadcrumb">


                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>


                                    <li class="breadcrumb-item active" aria-current="page"><?= $_ProductName ?>


                                        Dashboard</li>


                                </ol>


                            </div>


                        </div>


                        <!-- PAGE-HEADER END -->





                        <h2 class="page-title text-primary">Admin Dashboard</h2>





                        <div class="row mt-5">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">


                                <div class="row">








                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">


                                        <div class="card overflow-hidden">


                                            <div class="card-body">


                                                <div class="d-flex">


                                                    <div class="mt-2">


                                                        <h6 class="">Total Volunteer</h6>


                                                        <h2 class="mb-0 number-font">


                                                            <?php echo $stats_array['TotalTeams']; ?></h2>


                                                    </div>


                                                    <div class="ms-auto">


                                                        <div class="chart-wrapper mt-1">


                                                            <canvas id="" class="h-8 w-9 chart-dropshadow saleschart"></canvas>


                                                        </div>


                                                    </div>


                                                </div>


                                                <!--span class="text-muted fs-12"><span class="text-secondary"><i


                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>


                                                    Last week</span-->


                                            </div>


                                        </div>


                                    </div>








                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">


                                        <div class="card overflow-hidden">


                                            <div class="card-body">


                                                <div class="d-flex">


                                                    <div class="mt-2">


                                                        <h6 class="">Total Join Us </h6>


                                                        <h2 class="mb-0 number-font">


                                                            <?php echo $stats_array['TotalContactEnquiry']; ?></h2>


                                                    </div>


                                                    <div class="ms-auto">


                                                        <div class="chart-wrapper mt-1">


                                                            <canvas id="" class="h-8 w-9 chart-dropshadow costchart"></canvas>


                                                        </div>


                                                    </div>


                                                </div>


                                                <!--span class="text-muted fs-12"><span class="text-secondary"><i


                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>


                                                    Last week</span-->


                                            </div>


                                        </div>


                                    </div>











                                </div> <!-- row -->


                            </div>


                        </div>











                        <!-- ROW-2 -->


                        <!--div class="row">


                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">


                                <div class="card">


                                    <div class="card-header">


                                        <h3 class="card-title">Sales Analytics</h3>


                                    </div>


                                    <div class="card-body">


                                        <div class="d-flex mx-auto text-center justify-content-center mb-4">


                                            <div class="d-flex text-center justify-content-center me-3"><span


                                                    class="dot-label bg-primary my-auto"></span>Total Admission</div>


                                            <div class="d-flex text-center justify-content-center"><span


                                                    class="dot-label bg-secondary my-auto"></span>Total Fees</div>


                                        </div>


                                        <div class="chartjs-wrapper-demo">


                                            <canvas id="transactions" class="chart-dropshadow"></canvas>


                                        </div>


                                    </div>


                                </div>


                            </div>





                        </div> -->


                        <!-- ROW-2 END -->





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


        //include("../include/common-script.php");


        include("../include/common-script-v2.php");


        ?>


        <!-- INTERNAL CHARTJS CHART JS-->


        <script src="../theme-assets/plugins/chart/Chart.bundle.js"></script>


        <script src="../theme-assets/plugins/chart/utils.js"></script>


        <script src="../theme-assets/js/index1.js"></script>











        <script>


        $("#dasboard").addClass("open");


        $("#dasboard").addClass("active");


        </script>


</body>





</html>


