$(document).ready(function () {
  var i = 1;
  $("#all_gallery_video").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-gallery-video-post.php",
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
        data: "Title",
      },
      {
        data: "Action",
      },
    ],
  });
});

function AddUpdateGalleryVideoForm() {
  var VideoTitle = $("#VideoTitle").val();

  if (VideoTitle == "") {
    ProductAlert("Please Enter Video Title");
    return false;
  }

  var VideoCode = $("#VideoCode").val();

  if (VideoCode == "") {
    ProductAlert("Please Enter Video Code");
    return false;
  }

  let myForm = document.getElementById("gallery_video_form");
  var formData = new FormData(myForm);

  $("#addGalleryBtn").html("Please Wait..");
  $.ajax({
    url: "action/gallery-video-form-action.php",
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
        $("#gallery_video_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteGalleryVideo(video_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete Blog?",
    function () {
      $.post(
        "action/delete-gallery-video.php",
        {
          ID: video_id,
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

