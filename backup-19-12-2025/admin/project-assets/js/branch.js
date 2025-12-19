$(document).ready(function () {
  var i = 1;
  $('#all_branch').dataTable({
    responsive: true,
    'processing': true,
    'serverSide': true,
    'ordering': false,
    'serverMethod': 'post',
    'ajax': {
      'url': 'ajax/view-all-branch_post.php'
    },
    'columnDefs': [{
      "targets": [0],
      "className": "text-center"
    }],
    "order": [
      [1, 'asc']
    ],
    'columns': [{
      "data": "id",
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },
    {
      data: 'BranchName'
    },
    {
      data: 'Manager'
    },
    {
      data: 'Action'
    }


    ]


  });
});


function AddBranch() {
  $("#form_action").val("add");
  $("#branch_form")[0].reset();
  $("#add_branch").modal("show");
  $("#addBranchBtn").html("Add");
  $("#BranchHeading").html("Add Institute Branch / Center");
  $("#form_id").val('-1');
}

function UpdateBranch_modal(branch_id) {

  $("#addBranchBtn").html("Update");
  $("#BranchHeading").html("Update Institute Branch / Center");

  $.post("action/get_branch_details.php", {
    ID: branch_id
  },
    function (data, status) {
      var response = JSON.parse(data);
      if (response.error == false) {
        var branchname = response.data.BranchName;
        //var branchManager = response.data.Manager;
        $("#branchname").val(branchname);
        //$("#branchManager").val(branchManager);
        $("#form_action").val("Update");
        $("#form_id").val(branch_id);
      }
    });
  $("#add_branch").modal("show");
}


function AddUpdateBranchForm() {
  var branchname = $("#branchname").val();

  if (branchname == "") {
    ProductAlert("Please Enter Branch Name");
    return false;
  }

  let myForm = document.getElementById("branch_form");
  var formData = new FormData(myForm);

  $("#addInvoiceBtn").html("Please Wait..");
  $.ajax({
    url: "action/branch-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        $("#addBranchBtn").html("Add");
        $('#branch_form')[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;

}

function DeleteBranch(branch_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete Branch?",
    function () {
      $.post(
        "action/delete-branch.php",
        {
          ID: branch_id,
        },
        function (data, status) {
          var response = JSON.parse(data);
          ProductAlert(response.message);
          if (response.error == false) {
            setInterval(function () {
              location.reload();
            }, 2000);
          }
        }
      );
    },
    function () {
      alertify.error("Deletion Cancelled");
    }
  );
}

function OpenModal_AddBranchManager($BranchID) {
  $("#branch_manager_assign_form")[0].reset();
  $("#addBranchManagerBtn").html("Add");
  $("#BranchManagerHeading").html("Add Branch Manager");
  $("#branch_id").val($BranchID);
  $("#add_branch_manager_modal").modal("show");
}

function isValidEmail(email) {
  // Regular expression to check if the email is valid
  var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;

  // Test the email against the regular expression
  return emailRegex.test(email);
}

function validaphone(phone) {
  var regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  if (!regex.test(phone)) {
    return false;
  } else {
    return true;
  }
}


function validISNumber(basic) {
  const input = event.target;
  let value = input.value;

  value = value.replace(/[^0-9.]/g, ''); // Remove non-numeric characters
  input.value = value;
}

function AddBranchManagerForm() {
  var managername = $("#managername").val();

  if (managername == "") {
    ProductAlert("Please Enter Manager Name");
    return false;
  }

  var managermobile = $("#managermobile").val();

  if (managermobile == "") {
    ProductAlert("Please Enter Manager Mobile No.");
    return false;
  }

  if(validaphone(managermobile) == false){
    ProductAlert("Please Enter Valid Phone Number.");
    return false;
}

  var manageremail = $("#manageremail").val();

  if (manageremail == "") {
    ProductAlert("Please Enter Manager Email");
    return false;
  }

  if (isValidEmail(manageremail) == false) {
    ProductAlert("Please Enter Valid Email.");
    return false;
  }

  var password = $("#password").val();
  if(password == ""){
      ProductAlert("Please Enter User Password");
      return false;
  }

  var confirm_password = $("#confirm_password").val();
  if(confirm_password == ""){
      ProductAlert("Please Enter Confirm Password");
      return false;
  }

  if(password !== confirm_password)
  {
      ProductAlert("Password and Confirm Password doesn't match");
      return false;
  }

  let myForm = document.getElementById("branch_form");
  var formData = new FormData(myForm);

  $("#addInvoiceBtn").html("Please Wait..");
  $.ajax({
    url: "action/branch-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        $("#addBranchBtn").html("Add");
        $('#branch_form')[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;

}
