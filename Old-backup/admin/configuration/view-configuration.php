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

      <title>View Configuration</title>

      <?php

         include("../include/common-head.php");

         

         $dbh = new Dbh();

         

         $conn = $dbh->_connectodb();

         

         $IMSSetting = new IMSSetting($conn);

         

         $core = new Core();

         

         $website_info = $IMSSetting->GetWebsiteInfoDetailsbyID();

         

         // $All_blog_category = $IMSSetting->GetAllCategory();

         

         // $all_telecaller_lead_status = $IMSSetting->GetAllTelecallerLeadStatus();

         

         $authentication = new Authentication($conn);

         

         $UserType = $authentication->SessionCheck();

         

         ?>

      <style type="text/css">

         .settings-display {

         display: flex;

         justify-content: center;

         align-items: center;

         }

         .settings-display .card {

         width: 50%;

         }

      </style>

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.css" />

      <script src="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.js"></script>

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

                  <div class="page-header row align-items-center justify-content-between">

                     <!-- <h1 class="page-title">DigitalWorkDesk Dashboard</h1> -->

                     <div class="col-md-6">

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                           <li class="breadcrumb-item active" aria-current="page">Configuration</li>

                        </ol>

                     </div>

                  </div>

                  <div class="row">

                     <!-- Lead Source -->

                     <div class="col-md-12">

                        <div class="card ">

                           <div class="card-header d-flex justify-content-between align-items-center">

                              <h3 class="card-title">Social Media</h3>

                           </div>

                           <div class="card-body">

                              <form id="website_info" onsubmit="return false;">

                                 <div class="row">

                                    <div class="mb-3 col-12 col-md-4">

                                       <label for="recipient-name" class="col-form-label">Facebook Link</label>

                                       <input type="text" class="form-control" name="Facebook"

                                          id="Facebook" Placeholder="Enter Facebook Link" value="<?php echo $website_info['Facebook'];?>">

                                    </div>

                                    <div class="mb-3 col-12 col-md-4">

                                       <label for="recipient-name" class="col-form-label">Instagram Link</label>

                                       <input type="text" class="form-control" name="Instagram"

                                          id="Instagram" Placeholder="Enter Instagram Link" value="<?php echo $website_info['Instagram'];?>">

                                    </div>

                                    <div class="mb-3 col-12 col-md-4">

                                       <label for="recipient-name" class="col-form-label">LinkedIn Link</label>

                                       <input type="text" class="form-control" name="LinkedIn"

                                          id="LinkedIn" Placeholder="Enter LinkedIn Link" value="<?php echo $website_info['LinkedIn'];?>">

                                    </div>

                                    <div class="mb-3 col-12 col-md-4">

                                       <label for="recipient-name" class="col-form-label">Youtube Link</label>

                                       <input type="text" class="form-control" name="Youtube" id="Youtube"

                                          Placeholder="Enter Youtube Link" value="<?php echo $website_info['Youtube'];?>">

                                    </div>

                                    <div class="mb-3 col-12 col-md-4">

                                       <label for="recipient-name" class="col-form-label">Twiter Link</label>

                                       <input type="text" class="form-control" name="Twiter" id="Twiter"

                                          Placeholder="Enter Twiter Link" value="<?php echo $website_info['Twiter'];?>">

                                    </div>

                                    <div class="mb-3 col-12 col-md-4">

                                       <label for="recipient-name" class="col-form-label">Hotline No.</label>

                                       <input type="text" class="form-control" name="Hotline" id="Hotline"

                                          Placeholder="Enter Hotline Number" value="<?php echo $website_info['Hotline'];?>">

                                    </div>

                                    <div class="mb-3 col-12 col-md-4">

                                       <label for="recipient-name" class="col-form-label">Email ID</label>

                                       <input type="text" class="form-control" name="Email" id="Email"

                                          Placeholder="Enter Email " value="<?php echo $website_info['Email'];?>">

                                    </div>

                                    <div class="mb-3 col-12 col-md-4">

                                       <label for="recipient-name" class="col-form-label">WhatsApp No.</label>

                                       <input type="text" class="form-control" name="WhatsApp"

                                          id="WhatsApp" Placeholder="Enter WhatsApp Number" value="<?php echo $website_info['WhatsApp'];?>">

                                    </div>

                                 </div>

                                 <input type="hidden" name="website_form_action" id="website_form_action"

                                    value="update" />

                                 <input type="hidden" name="website_form_id" id="website_form_id"

                                    value="1" />

                                 <div class="text-end">

                                    <a class="btn btn-info mt-2" onclick="AddUpdateWebsiteForm()"

                                       id='WebsiteInfoBtn'>Save & Update</a>

                                 </div>

                              </form>

                           </div>

                        </div>

                     </div>

                     <div class="col-md-12 mt-3">

                        <div class="card ">

                           <div class="card-header d-flex justify-content-between align-items-center">

                              <h3 class="card-title">Website Development Info</h3>

                           </div>

                           <div class="card-body">

                              <div class="table-responsive">

                                 <table class="table table-bordered text-nowrap border-bottom" id="">

                                    <thead>

                                       <th>Use For</th>

                                       <th>Class</th>

                                    </thead>

                                    <tbody>

                                       <tr>

                                          <td class="wd-15p border-bottom-0">Button</td>

                                          <td class="wd-15p border-bottom-0">link_primary</td>

                                       </tr>

                                       <tr>

                                          <td class="wd-15p border-bottom-0">White Text</td>

                                          <td class="wd-15p border-bottom-0">text-light</td>

                                       </tr>

                                       <tr>

                                          <td class="wd-15p border-bottom-0">Black Text</td>

                                          <td class="wd-15p border-bottom-0">text-dark</td>

                                       </tr>

                                       <tr>

                                          <td class="wd-15p border-bottom-0">Text Center</td>

                                          <td class="wd-15p border-bottom-0">text-center</td>

                                       </tr>

                                       <tr>

                                          <td class="wd-15p border-bottom-0">Primary Color Code</td>

                                          <td class="wd-15p border-bottom-0">#f78932</td>

                                       </tr>

                                       <tr>

                                          <td class="wd-15p border-bottom-0">Font Color Code</td>

                                          <td class="wd-15p border-bottom-0">#2f2f2fd4</td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

                  <!-- ------------------Hamari Sevaye------------------- -->

                  <div class="container-fluid mt-4">

                    <div class="row">

                    <div class="col-6">

                     <div class="card shadow-lg border-0 rounded-3">

                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                           <h5 class="mb-0">हमारी सेवाएँ</h5>

                           <button class="btn btn-light btn-sm" onclick="openSevayeModal()">

                           <i class="bi bi-plus-circle me-1"></i> Add Service

                           </button>

                        </div>

                        <div class="card-body">

                           <table id="hamari_sevaye" class="table table-striped table-bordered nowrap" style="width:100%">

                              <thead>

                                 <tr>

                                    <th>#</th>

                                    <th>Name</th>

                                    <th>Images</th>

                                    <th>Action</th>

                                 </tr>

                              </thead>

                              <tbody>

                                 <!-- Data will be loaded via DataTables AJAX -->

                              </tbody>

                           </table>

                        </div>

                     </div>



                     </div>



                     <div class="col-6">
                    <div class="card shadow-lg border-0 rounded-3">
                      <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">सेवा उप-श्रेणियाँ (Subcategories)</h5>
                        <button class="btn btn-light btn-sm" onclick="openSubcategoryModal()">
                          <i class="bi bi-plus-circle me-1"></i> Add Subcategory
                        </button>
                      </div>
                      <div class="card-body">
                        <table id="sevaye_subcategory" class="table table-striped table-bordered nowrap" style="width:100%">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Category</th>
                              <th>Subcategory Name</th>
                              <th>Image</th>
                              <th>प्राथमिकता</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Loaded via DataTables -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                     

                     </div>

                  </div>

                  <!-- Modal Form -->

                  <div class="modal fade" id="sevayeModal" tabindex="-1" aria-labelledby="sevayeModalLabel" aria-hidden="true">

                     <div class="modal-dialog">

                        <div class="modal-content">

                          <form id="sevayeForm" onsubmit="return false;" method="POST" enctype="multipart/form-data">

                                <div class="modal-header bg-primary text-white">

                                    <h5 class="modal-title" id="sevayeModalLabel">नई सेवा जोड़ें</h5>

                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">X</button>

                                </div>

                                <div class="modal-body">

                                    <div class="mb-3">

                                        <label class="form-label">सेवा का नाम (Name)</label>

                                        <input type="text" class="form-control" name="service_name" id="service_name" placeholder="उदा: आचार्य विद्यासागर गौ अस्पताल" required>

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">सेवा की तस्वीर (Image Size: 331 × 369)</label>

                                        <input type="file" class="form-control" name="service_image" id="service_image" accept="image/*" required>

                                    </div>



                                    <div class="mb-3">

                                        <label class="form-label">सेवा की Page Url</label>

                                        <input type="text" class="form-control" name="page_url" id="page_url" placeholder="example.php or example"required>

                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary" id="sevayeBtnId" onclick="SaveSevayeData()">Save</button>

                                </div>

                                <input type="hidden" name="sevayeForm_action" id="sevayeForm_action" value="add">

                                <input type="hidden" name="sevayeForm_action_value" id="sevayeForm_action_value" value="-1">

                            </form>



                        </div>

                     </div>

                  </div>

               </div>

               <!-- CONTAINER END -->

            </div>

         </div>

         <!--app-content close-->


          <!-- --------------------------------Up Sevaye------------------------ -->

                

                  <!-- Subcategory Modal -->
                  <div class="modal fade" id="subcategoryModal" tabindex="-1" aria-labelledby="subcategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form id="subcategoryForm" onsubmit="return false;" method="POST" enctype="multipart/form-data">
                          <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="subcategoryModalLabel">नई उप-श्रेणी जोड़ें</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">X</button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                                  <label class="form-label">श्रेणी चुनें (Select Category)</label>
                                  <select class="form-select" name="category_id" id="category_id" required>
                                      <option value="">Select Category</option>
                                      <?php
                                      $AllSevaye = $IMSSetting->AllSevaye();
                                      if (!empty($AllSevaye)) {
                                          foreach ($AllSevaye as $sevaye) {
                                              $id = $sevaye['ID'];
                                              $name = $sevaye['Name'];
                                              echo "<option value=\"$id\">$name</option>";
                                          }
                                      }
                                      ?>
                                  </select>
                              </div>

                            <div class="mb-3">
                              <label class="form-label">उप-श्रेणी का नाम (Subcategory Name)</label>
                              <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" required>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">तस्वीर (Image Size: 331 × 369)</label>
                              <input type="file" class="form-control" name="subcategory_image" id="subcategory_image" accept="image/*">
                            </div>

                             <div class="mb-3">
                              <label class="form-label">प्राथमिकता (Priority)</label>
                              <input type="number" class="form-control" name="priority" id="priority">
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="subcategoryBtn" onclick="SaveSubcategoryData()">Save</button>
                          </div>
                          <input type="hidden" name="subcategory_action" id="subcategory_action" value="add">
                          <input type="hidden" name="subcategory_id" id="subcategory_id" value="-1">
                        </form>
                      </div>
                    </div>
                  </div>


         <?php

            include("../navigation/right-side-navigation.php");

            

            ?>

      </div>

      <?php

         include("../include/common-script.php");

         

         ?>

      <script>

         $("#nav_configuration").addClass("active");

         

      </script>

      <div class="modal fade" tabindex="-1" id="modal_lead_source">

         <div class="modal-dialog modal-md" role="document">

            <div class="modal-content modal-content-demo">

               <div class="modal-header">

                  <h3 class="modal-title" id="SocialHeading">Social Media</h3>

                  <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">×</span>

                  </button>

               </div>

               <div class="modal-body">

                  <form id="social_form" onsubmit="return false;">

                     <input type="hidden" name="social_form_action" id="social_form_action" value="add" />

                     <input type="hidden" name="social_form_id" id="social_form_id" value="-1" />

                     <div class="row">

                        <div class="form-group col-md-12 mb-3">

                           <label for="recipient-name" class="col-form-label">Social Icon </label>

                           <input type="file" class="form-control" name="SocialIcon" id="SocialIcon">

                           <input type="hidden" name="old_social_img" id="old_social_img">

                        </div>

                        <div class="form-group col-md-12 mb-3">

                           <label for="recipient-name" class="col-form-label">Link </label>

                           <input type="text" class="form-control" name="Link" id="Link">

                        </div>

                        <div class="form-group col-md-12 mb-3">

                           <label for="recipient-name" class="col-form-label">Feature / Priority </label>

                           <input type="number" class="form-control" name="Feature" id="Feature" value="0"

                              min="1">

                        </div>

                     </div>

                     <div class="mt-5 text-center">

                        <button class="btn btn-success text-white" id="addSocialBtn"

                           onclick="AddUpdateSocialForm()">Add</button>

                     </div>

                  </form>

               </div>

            </div>

         </div>

      </div>

      <script src="../project-assets/js/configuration.js"></script>

   </body>

</html>