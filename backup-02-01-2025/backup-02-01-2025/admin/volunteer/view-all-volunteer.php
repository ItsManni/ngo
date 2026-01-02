<?php

error_reporting(E_ALL);

// Display errors on screen
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
    <title>View All Volunteers - <?= $_ProductName ?> ICS</title>

    <?php
    include("../include/common-head.php");

    $dbh = new Dbh();
    $conn = $dbh->_connectodb();

    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();

    // Use Volunteer class instead of Users
    $volunteer = new Volunteer($conn);
    $all_volunteer_details = $volunteer->getAllActiveVolunteers();
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
                            <h1 class="page-title">All Volunteers</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Volunteers</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <a href="#" onclick="AddVolunteer()" class="btn btn-success">Add Volunteer</a>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="view-users">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Occupation</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i=1;
                                                    foreach($all_volunteer_details as $volunteer_data){
                                                        $id  = $volunteer_data['ID'];
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $volunteer_data['Name']; ?></td>
                                                        <td><?= $volunteer_data['Mobile']; ?></td>
                                                        <td><?= $volunteer_data['Email']; ?></td>
                                                        <td><?= $volunteer_data['Occupation']; ?></td>
                                                        <td><?= $volunteer_data['City']; ?></td>
                                                        <td><?= $volunteer_data['State']; ?></td>
                                                        <td>
                                                            <div class="g-2">
                                                                <a class="btn text-danger btn-sm"
                                                                   data-bs-toggle="tooltip"
                                                                   onclick="DeleteUser(<?= $id;?>)"
                                                                   data-bs-original-title="Delete">
                                                                    <span class="fe fe-trash-2 fs-14"></span>
                                                                </a>
                                                                <a class="btn text-primary btn-sm"
                                                                   data-bs-toggle="tooltip"
                                                                   onclick="EditUserDetails_modal(<?= $id;?>)"
                                                                   data-bs-original-title="Edit">
                                                                    <span class="fe fe-edit fs-14"></span>
                                                                </a>
                                                            </div>
                                                        </td>
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

            <!-- start volunteer modal -->
            <div class="modal fade" id="edit_user_modal" tabindex="-1">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">

                  <div class="modal-header">
                    <h3 class="modal-title">Fill Up The Form</h3>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                  </div>

                  <div class="modal-body">
                    <form id="edit_user_form" onsubmit="return false;">
                      <div class="row">

                        <!-- Name -->
                        <div class="mb-3 col-6">
                          <label class="col-form-label">Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="UserName" id="UserName" placeholder="Enter Name">
                        </div>

                        <!-- Email -->
                        <div class="mb-3 col-6">
                          <label class="col-form-label">Email <span class="text-danger">*</span></label>
                          <input type="email" class="form-control" name="UserEmail" id="UserEmail" placeholder="Enter Email">
                        </div>

                        <!-- Occupation -->
                        <div class="mb-3 col-6">
                          <label class="col-form-label">Occupation</label>
                          <select class="form-select" name="UserOccupation" id="UserOccupation">
                            <option value="">Select Occupation</option>
                            <option value="Student">Student</option>
                            <option value="Working">Working</option>
                            <option value="Business">Business</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>

                        <!-- Mobile -->
                        <div class="mb-3 col-6">
                          <label class="col-form-label">Mobile</label>
                          <div class="input-group">
                            <span class="input-group-text">+91</span>
                            <input type="text" maxlength="10" class="form-control" name="UserPhoneNumber" id="UserPhoneNumber" placeholder="Enter Phone Number">
                          </div>
                        </div>

                        <!-- Country -->
                        <div class="mb-3 col-6">
                          <label class="col-form-label">Country</label>
                          <select class="form-select" name="UserCountry" id="UserCountry">
                            <option value="India" selected>India</option>
                          </select>
                        </div>

                        <!-- Pincode -->
                        <div class="mb-3 col-6">
                          <label class="col-form-label">Pincode</label>
                          <input type="text" class="form-control" name="UserPincode" id="UserPincode" placeholder="Enter Pincode">
                        </div>

                        <!-- State -->
                        <div class="mb-3 col-6">
                        <label class="col-form-label">State</label>
                        <select class="form-select" name="UserState" id="UserState">
                          <option value="">Select State</option>
                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                          <option value="Assam">Assam</option>
                          <option value="Bihar">Bihar</option>
                          <option value="Chhattisgarh">Chhattisgarh</option>
                          <option value="Goa">Goa</option>
                          <option value="Gujarat">Gujarat</option>
                          <option value="Haryana">Haryana</option>
                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                          <option value="Jharkhand">Jharkhand</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Kerala">Kerala</option>
                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Manipur">Manipur</option>
                          <option value="Meghalaya">Meghalaya</option>
                          <option value="Mizoram">Mizoram</option>
                          <option value="Nagaland">Nagaland</option>
                          <option value="Odisha">Odisha</option>
                          <option value="Punjab">Punjab</option>
                          <option value="Rajasthan">Rajasthan</option>
                          <option value="Sikkim">Sikkim</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Telangana">Telangana</option>
                          <option value="Tripura">Tripura</option>
                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                          <option value="Uttarakhand">Uttarakhand</option>
                          <option value="West Bengal">West Bengal</option>
                        </select>
                      </div>


                        <!-- City -->
                        <div class="mb-3 col-6">
                          <label class="col-form-label">City</label>
                          <input type="text" class="form-control" name="UserCity" id="UserCity" placeholder="Enter City">
                        </div>

                        <!-- Address -->
                        <div class="mb-3 col-12">
                          <label class="col-form-label">Your Address</label>
                          <textarea class="form-control" rows="2" name="UserAddress" id="UserAddress" placeholder="Enter Address"></textarea>
                        </div>

                        <!-- Consent -->
                        <div class="mb-3 col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="UserConsent" id="UserConsent" checked>
                            <label class="form-check-label" for="UserConsent">
                              I give my consent to contact me for the help of desi gauvansh in need in your area.
                            </label>
                          </div>
                        </div>

                        <!-- Hidden ID -->
                        <input type="hidden" name="EditFormID" id="EditFormID" value="-1">

                        <!-- Submit -->
                        <div class="mt-3 text-center col-12">
                          <button class="btn btn-success text-white" id="EditUserBtn" onclick="UpdateUserDetails()">Submit</button>
                        </div>

                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <!-- end volunteer modal -->

            <?php
            include("../navigation/right-side-navigation.php");
            ?>

        </div>

        <?php
        include("../include/common-script.php");
        ?>

        <script src="../project-assets/js/volunteer.js"></script>
        <script src="../project-assets/js/commonjs.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_volunteer").addClass("active");
        });
        </script>
</body>
</html>
