$(document).ready(function () {
  var i = 1;
  $("#all_news_pr").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-news-pr-post.php",
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
        data: "NewsBanner",
      },
      {
        data: "Heading",
      },
      {
        data: "NewsDate",
      },
      {
        data: "Action",
      },
    ],
  });
});


function AddUpdateNewsPRForm() {
  var NewsBanner = document.getElementById("NewsBanner");
  var old_cs_img = document.getElementById("old_cs_img");

  if (old_cs_img == "") {
    if (!NewsBanner.value) {
      ProductAlert("Please Upload News & PR Banner.");
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
    ProductAlert("Please Enter Url");
    return false;
  }

  var NewsDate = $("#NewsDate").val();

  if (NewsDate == "") {
    ProductAlert("Please Enter News Date");
    return false;
  }

  var NewsDescription = $("#NewsDescription").val();

  if (NewsDescription == "") {
    ProductAlert("Please Enter News Description");
    return false;
  }

  let myForm = document.getElementById("news_pr_form");
  var formData = new FormData(myForm);
  var form_action = $("#form_action").val();

  $("#addNewsPRBtn").html("Please Wait..");
  $.ajax({
    url: "action/news-pr-form-action.php",
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
          $("#addNewsPRBtn").html("Save & Submit");
        } else {
          $("#addNewsPRBtn").html("Save & Update");
        }
        $("#news_pr_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteNewsPR(case_studies_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete?",
    function () {
      $.post(
        "action/delete-news-pr.php",
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
