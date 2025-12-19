<?php

@session_start();

require_once "../include/autoloader.inc.php";



$conf = new Conf();

$_ProductName = $conf->_ProductName;

$_ProductLogo = $conf->_ProductLogo;

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <title>View All Products - <?= $_ProductName ?></title>

    <?php

    include "../include/common-head.php";



    $dbh = new Dbh();

    $conn = $dbh->_connectodb();

    $core = new Core();

    $authentication = new Authentication($conn);

    $UserType = $authentication->SessionCheck();

    $sevaye_obj=new IMSSetting($conn);

    $All_sevaye=$sevaye_obj->AllSevaye();

    ?>

</head>

<body class="app sidebar-mini ltr light-mode">

<div class="page">

    <div class="page-main">

        <?php

        include "../navigation/top-header.php";

        include "../navigation/side-navigation.php";

        ?>



        <div class="main-content app-content mt-0">

            <div class="side-app">

                <div class="main-container container-fluid">

                    <div class="page-header mb-3">

                        <h1 class="page-title">ऑल प्रोडक्ट्स</h1>

                        <div>

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">होम</a></li>

                                <li class="breadcrumb-item active">व्यू ऑल प्रोडक्ट्स</li>

                            </ol>

                        </div>

                    </div>



                    <div class="row pb-3 justify-content-end">

                        <div class="col-md-4 text-end">

                            <button onclick="OpenProductModal()" class="btn btn-success">प्रोडक्ट जोड़ें</button>

                        </div>

                    </div>



                    <div class="row row-sm">

                        <div class="col-lg-12">

                            <div class="card">

                                <div class="card-body">

                                    <div class="table-responsive">

                                        <table class="table table-bordered text-nowrap border-bottom" id="all_products">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>सेवा</th>

                                                <th>प्रोडक्ट का नाम</th>

                                                <th>इमेज</th>

                                                <th>धनराशि</th>
                                                <th>प्राथमिकता</th>

                                                <th>एक्शन</th>

                                            </tr>

                                        </thead>

                                    </table>



                                    </div>

                                </div>

                            </div>

                        </div>

                    </div> 



                </div>

            </div>

        </div>



        <!-- Product Modal -->

       <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form id="productForm" method="POST" enctype="multipart/form-data" onsubmit="return false;">

                <div class="modal-header bg-primary text-white">

                    <h5 class="modal-title" id="productModalLabel">नया प्रोडक्ट जोड़ें</h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">x</button>

                </div>

                <div class="modal-body">



                    <!-- सेवाये Dropdown -->

                    <div class="mb-3">

                        <label class="form-label">सेवा चुनें</label>

                        <select class="form-control select2" name="sevaye_id" id="sevaye_id" required>

                            <option value="">-- सेवा चुनें --</option>

                            <?php foreach ($All_sevaye as $sevaye): ?>

                                <option value="<?= htmlspecialchars($sevaye['ID']) ?>">

                                    <?= htmlspecialchars($sevaye['Name']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                     <!-- Subcategory Dropdown -->
                    <div class="mb-3">
                        <label class="form-label">उप-श्रेणी चुनें (Select Subcategory)</label>
                        <select class="form-control" name="subcategory_id" id="subcategory_id" required>
                            <option value="">-- उप-श्रेणी चुनें --</option>
                            <!-- Options will be filled dynamically via JS -->
                        </select>
                    </div>



                    <!-- Product Name -->

                    <div class="mb-3">

                        <label class="form-label">प्रोडक्ट का नाम</label>

                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="उदा: चावल" required>

                    </div>



                    <!-- Product Image -->

                    <div class="mb-3">

                        <label class="form-label">प्रोडक्ट इमेज (403×193px)</label>

                        <div id="old_image_preview"></div>

                        <input type="file" class="form-control" name="product_image" id="product_image" accept="image/*" required>

                    </div>



                    <!-- Product Price -->

                    <div class="mb-3">

                        <label class="form-label">धनराशि (₹)</label>

                        <input type="number" class="form-control" name="product_price" id="product_price" required>

                    </div>


                    <div class="mb-3">
                        <label class="form-label">प्राथमिकता (Priority)</label>
                        <input type="number" class="form-control" name="product_priority" id="product_priority" placeholder="उदा: 1 (उच्च प्राथमिकता)" min="1" required>
                        <small class="text-muted">  छोटा नंबर = उच्च प्राथमिकता</small>
                      </div>

                </div>



                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" id="saveProductBtn" onclick="SaveProductData()">सेव करें</button>

                </div>



                <input type="hidden" name="form_action" id="form_action" value="add">

                <input type="hidden" name="product_id" id="product_id" value="-1">

            </form>

        </div>

    </div>

    </div>



        <!-- End Modal -->



        <?php include "../navigation/right-side-navigation.php"; ?>

    </div>



    <?php

    include "../include/common-script-v2.php";

    include "../include/common-script-datatables.php";

    ?>

    <script src="../project-assets/js/product.js"></script>



    <script>

        $(document).ready(function() {

    $('#sevaye_id').select2({

        dropdownParent: $('#productModal'), // ensures dropdown appears inside modal

        width: '100%',

        placeholder: "सेवा चुनें"

    });

});



    </script>

</div>

</body>

</html>

