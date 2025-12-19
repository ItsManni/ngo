$(document).ready(function () {
  var i = 1;
  $("#all_client").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-client-post.php",
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
        data: "Client",
      },
      {
        data: "Action",
      },
    ],
  });
});

function AddClient() {
  $("#form_action").val("add");
  $("#client_form")[0].reset();
  $("#add_client").modal("show");
  $("#addClientBtn").html("Add");
  $("#ClientHeading").html("Add Client");
  $("#form_id").val("-1");
}

function UpdateClient_modal(event_id) {
  $("#addClientBtn").html("Update");
  $("#ClientHeading").html("Update Client");

  $.post(
    "ajax/get_client_details.php",
    {
      ID: event_id,
    },
    function (data, status) {
      var response = JSON.parse(data);
      if (response.error == false) {
        $("#ClientUrl").val(response.data.ClientUrl);
        $("#OtherUrl").val(response.data.OtherUrl);
        $("#Feature").val(response.data.Feature);
        $("#old_client_img").val(response.data.Client);
        $("#old_client_img_html").html(response.data.Client);

        $("#form_action").val("Update");
        $("#form_id").val(event_id);
      }
    }
  );
  $("#add_client").modal("show");
}

function AddUpdateClientForm() {

  var Client = document.getElementById("Client");
  var old_client_img = document.getElementById("old_client_img");

  if (old_client_img == "") {
    if (!Client.value) {
      ProductAlert("Please Upload Client.");
      return false;
    }
  }

  let myForm = document.getElementById("client_form");
  var formData = new FormData(myForm);

  $("#addClientBtn").html("Please Wait..");
  $.ajax({
    url: "action/client-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        $("#addClientBtn").html("Add");
        $("#client_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteClient(client_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete ?",
    function () {
      $.post(
        "action/delete-client.php",
        {
          ID: client_id,
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
