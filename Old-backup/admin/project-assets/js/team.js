$(document).ready(function () {
    var i = 1;
    $('#all_team').dataTable({
      responsive: true,
      'processing': true,
      'serverSide': true,
      'ordering': false,
      'serverMethod': 'post',
      'ajax': {
        'url': 'ajax/view-all-team-post.php'
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
        data: 'ProfileImg'
      },
      {
        data: 'Name'
      },
      {
        data: 'Designation'
      },
      {
        data: 'Action'
      }
  
  
      ]
  
  
    });
  });
  
  
  function AddTeam() {
    $("#form_action").val("add");
    $("#team_form")[0].reset();
    $("#add_team").modal("show");
    $("#addTeamBtn").html("Add");
    $("#TeamHeading").html("Add Team");
    $("#form_id").val('-1');
  }
  
  function UpdateTeam_modal(event_id) {
  
    $("#addTeamBtn").html("Update");
    $("#TeamHeading").html("Update Team");
  
    $.post("ajax/get_team_details.php", {
      ID: event_id
    },
      function (data, status) {
        var response = JSON.parse(data);
        if (response.error == false) {
          $("#Name").val(response.data.Name);
          $("#Designation").val(response.data.Designation);
          $("#old_profile_img").val(response.data.ProfileImg);
          $("#form_action").val("Update");
          $("#form_id").val(event_id);
        }
      });
    $("#add_team").modal("show");
  }
  
  
  function AddUpdateTeamForm() {
    var Name = $("#Name").val();
  
    if (Name == "") {
      ProductAlert("Please Enter Name");
      return false;
    }

    var Designation = $("#Designation").val();
  
    if (Designation == "") {
      ProductAlert("Please Enter Designation");
      return false;
    }

  
    let myForm = document.getElementById("team_form");
    var formData = new FormData(myForm);
  
    $("#addTeamBtn").html("Please Wait..");
    $.ajax({
      url: "action/team-form-action.php",
      type: "POST",
      data: formData,
      success: function (data) {
        var response = JSON.parse(data);
        ProductAlert(response.message);
        if (response.error == false) {
          setInterval(function () {
            location.reload();
          }, 1500);
          $("#addTeamBtn").html("Add");
          $('#team_form')[0].reset();
        }
      },
      cache: false,
      contentType: false,
      processData: false,
    });
    return false;
  
  }
  
  function DeleteTeam(team_id) {
    alertify.confirm(
      _ProductName,
      "Do you really want to delete Team Member?",
      function () {
        $.post(
          "action/delete-team.php",
          {
            ID: team_id,
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
  
  
  