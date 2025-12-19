$(document).ready(function () {
  var i = 1;
  $("#all_gallery").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-gallery-post.php",
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
        data: "FeatureImage",
      },
      {
        data: "Title",
      },
      {
        data: "Action",
      },
    ],
  });
});

function AddUpdateGalleryForm() {
  var GalleryTitle = $("#GalleryTitle").val();

  if (GalleryTitle == "") {
    ProductAlert("Please Enter Gallery Title");
    return false;
  }

  var FeatureImage = document.getElementById("FeatureImage");
  var old_feature_img = document.getElementById("old_feature_img");

  if (old_feature_img == "") {
    if (!FeatureImage.value) {
      ProductAlert("Please Upload Gallery Feature Image.");
      return false;
    }
  }

  let myForm = document.getElementById("gallery_form");
  var formData = new FormData(myForm);

  $("#addGalleryBtn").html("Please Wait..");
  $.ajax({
    url: "action/gallery-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        $("#addGalleryBtn").html("Add");
        $("#gallery_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteBlog(blog_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete Blog?",
    function () {
      $.post(
        "action/delete-blog.php",
        {
          ID: blog_id,
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

function AddGalleryImage() {
  var new_gallery_counter = $("#new_gallery_counter").val();
  next_counter = parseInt(new_gallery_counter) + 1;
  $.post(
    "ajax/gallery-html.php",
    {
      counter: new_gallery_counter,
    },
    function (data, status) {
      $("#gallery_body_div").append(data);
    }
  );
  $("#new_gallery_counter").val(next_counter);
}
function DeleteGalleryImage(counter) {
  var div_id = "gallery_row_" + counter;
  $("#" + div_id).remove();
}

function PermaDeleteApplicationGallery(application_gallery_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete?",
    function () {
      $.post(
        "action/delete-application-gallery.php",
        {
          ID: application_gallery_id,
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
const headingInput = document.getElementById("GalleryTitle");

function generateUrl() {
  const headingText = headingInput.value;
  const urlFriendlyText = headingText
    .trim()
    .toLowerCase()
    .replace(/[^a-z0-9-_ ]+/g, "")
    .replace(/\s+/g, "-");

  urlOutput.value = urlFriendlyText;
}
