$(document).ready(function () {
  var i = 1;
  $("#all_case_studies").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-case-studies-post.php",
    },
    columnDefs: [
      {
        targets: [0],
        className: "text-center",
      },
    ],
    order: [[1, "asc"]],
    columns: [
      {
        data: "id",
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      {
        data: "CSBanner",
      },
      {
        data: "Heading",
      },
      {
        data: "CaseDate",
      },
      {
        data: "Action",
      },
    ],
  });
});

function AddCaseStudies() {
  $("#form_action").val("add");
  $("#case_studies_form")[0].reset();
  $("#add_case_studies").modal("show");
  $("#addCaseStudiesBtn").html("Add");
  $("#CaseStudiesHeading").html("Add Case Studies");
  $("#form_id").val("-1");
}

function UpdateCaseStudies_modal(event_id) {
  $("#addCaseStudiesBtn").html("Update");
  $("#CaseStudiesHeading").html("Update Case Studies");

  $.post(
    "ajax/get_case_studies_details.php",
    {
      ID: event_id,
    },
    function (data, status) {
      var response = JSON.parse(data);
      if (response.error == false) {
        $("#Heading").val(response.data.Heading);
        $("#Url").val(response.data.Url);
        $("#CaseDate").val(response.data.CaseDate);
        $("#CaseDescription").val(response.data.CaseDescription);
        $("#old_cs_img").val(response.data.CSBanner);
        $("#form_action").val("Update");
        $("#form_id").val(event_id);
      }
    }
  );
  $("#add_case_studies").modal("show");
}

function AddUpdateCaseStudiesForm() {
  var CSBanner = document.getElementById("CSBanner");
  var old_cs_img = document.getElementById("old_cs_img");

  if (old_cs_img == "") {
    if (!CSBanner.value) {
      ProductAlert("Please Upload Case Studies Banner.");
      return false;
    }
  }

  var Heading = $("#Heading").val();

  if (Heading == "") {
    ProductAlert("Please Enter Heading");
    return false;
  }

  var Url = $("#Url").val();

  if (Url == "") {
    ProductAlert("Please Enter Case Studies Url");
    return false;
  }

  var CaseDate = $("#CaseDate").val();

  if (CaseDate == "") {
    ProductAlert("Please Enter Case Studies Date");
    return false;
  }

  var CaseDescription = $("#CaseDescription").val();

  if (CaseDescription == "") {
    ProductAlert("Please Enter Case Studies Description");
    return false;
  }

  let myForm = document.getElementById("case_studies_form");
  var formData = new FormData(myForm);
  var form_action = $("#form_action").val();

  $("#addCaseStudiesBtn").html("Please Wait..");
  $.ajax({
    url: "action/case-studies-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        if (form_action == "add") {
          $("#addCaseStudiesBtn").html("Save & Submit");
        } else {
          $("#addCaseStudiesBtn").html("Save & Update");
        }
        $("#case_studies_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteCaseStudies(case_studies_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete Case Studies?",
    function () {
      $.post(
        "action/delete-case-studies.php",
        {
          ID: case_studies_id,
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

const urlOutput = document.getElementById("Url");
const headingInput = document.getElementById("Heading");

// Function to generate a URL from the heading input
function generateUrl() {
  const headingText = headingInput.value;
  const urlFriendlyText = headingText
    .trim()
    .toLowerCase()
    .replace(/[^a-z0-9-_ ]+/g, "")
    .replace(/\s+/g, "-");

  urlOutput.value = urlFriendlyText;
}
