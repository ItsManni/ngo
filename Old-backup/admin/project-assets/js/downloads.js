$(document).ready(function () {
    var i = 1;
    $('#all_downloads').dataTable({
      responsive: true,
      'processing': true,
      'serverSide': true,
      'ordering': false,
      'serverMethod': 'post',
      'ajax': {
        'url': 'ajax/view-all-download-post.php'
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
        data: 'Title'
      },
      {
        data: 'Action'
      },
      ]
  
  
    });
  });
  
  
  function AddDownloads() {
    $("#form_action").val("add");
    $("#download_form")[0].reset();
    $("#add_download").modal("show");
    $("#addDownloadsBtn").html("Add");
    $("#DownloadsHeading").html("Add Downloads");
    $("#form_id").val('-1');
  }
  
  function UpdateDownloads_modal(event_id) {
  
    $("#addDownloadsBtn").html("Update");
    $("#DownloadsHeading").html("Update Downloads");
  
    $.post("ajax/get_download_details.php", {
      ID: event_id
    },
      function (data, status) {
        var response = JSON.parse(data);
        if (response.error == false) {
          $("#Title").val(response.data.Title);
          $("#Link").val(response.data.Link);
          // $("#old_profile_img").val(response.data.ProfileImg);
          $("#form_action").val("Update");
          $("#form_id").val(event_id);
        }
      });
    $("#add_download").modal("show");
  }
  
  
  function AddUpdateDownloadsForm() {
    // var Name = $("#Name").val();
  
    // if (Name == "") {
    //   ProductAlert("Please Enter Name");
    //   return false;
    // }

    // var Designation = $("#Designation").val();
  
    // if (Designation == "") {
    //   ProductAlert("Please Enter Designation");
    //   return false;
    // }

  
    let myForm = document.getElementById("download_form");
    var formData = new FormData(myForm);
  
    $("#addDownloadsBtn").html("Please Wait..");
    $.ajax({
      url: "action/download-form-action.php",
      type: "POST",
      data: formData,
      success: function (data) {
        var response = JSON.parse(data);
        ProductAlert(response.message);
        if (response.error == false) {
          setInterval(function () {
            location.reload();
          }, 1500);
          $("#addDownloadsBtn").html("Add");
          $('#download_form')[0].reset();
        }
      },
      cache: false,
      contentType: false,
      processData: false,
    });
    return false;
  
  }
  
  function DeleteDownloads(download_id) {
    alertify.confirm(
      _ProductName,
      "Do you really want to delete Downloads?",
      function () {
        $.post(
          "action/delete-download.php",
          {
            ID: download_id,
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
  
  
  