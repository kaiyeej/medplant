<style>
    .profile-info ul li span{
        color:#343a40;
    }
</style>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Profile
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <i class="icon-copy fa fa-user-circle-o" aria-hidden="true" style="font-size: 150px;color: #aaa;"></i>
                        </div>
                        <h5 class="text-center h5 mb-0  text-blue"><span class="main_fullname_label"></span></h5>
                        <p class="text-center text-muted font-14">
                            <span class="main_category_label"></span>
                        </p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Username:</span>
                                    <span class="main_username_label"></span>
                                </li>
                                <li>
                                    <span>Email Address:</span>
                                    <span class="main_email_label"></span>
                                </li>
                                <li>
                                    <span>Date Last Modified:</span>
                                    <span class="main_date_label"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul id="myTab" class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab" aria-selected="true">Personal Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setting" role="tab" aria-selected="false">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Timeline Tab start -->
                                    <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                                        <div class="profile-setting">
                                            <form method='POST' id='frm_profile' class="profile">
                                                <div class="profile-edit-list row">
                                                    <div class="weight-500 col-md-4">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input class="form-control form-control input-item" id="user_fname" name="input[user_fname]" type="text">
                                                        </div>
                                                    </div>
                                                    <input class="form-control form-control " id="hidden_id"  value="<?php echo $_SESSION['mp_user_id'] ?>" type="hidden">
                                                    <div class="weight-500 col-md-4">
                                                        <div class="form-group">
                                                            <label>Middle Name</label>
                                                            <input class="form-control form-control input-item" id="user_mname" name="input[user_mname]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="weight-500 col-md-4">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input class="form-control form-control input-item" id="user_lname" name="input[user_lname]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="weight-500 col-md-6">
                                                        <div class="form-group">
                                                            <label>Contact #</label>
                                                            <input class="form-control form-control input-item" id="user_contact_num" name="input[user_contact_num]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="weight-500 col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control form-control input-item" id="user_email" name="input[user_email]" type="email">
                                                        </div>
                                                    </div>
                                                    <div class="weight-500 col-md-12">
                                                        <div class="form-group mb-0">
                                                            <button id="btn_submit" type="submit" class="btn btn-success">Update Information</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Timeline Tab End -->
                                    <!-- Setting Tab start -->
                                    <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                                        <div class="profile-setting">
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">
                                                            Edit Username
                                                        </h4>
                                                        <form method='POST' id='frm_username'>
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input class="form-control form-control input-item" id="username" name="input[username]" type="text">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <button id="btn_username" type="submit" class="btn btn-info">Save</button>
                                                            </div>
                                                        </form>
                                                    </li>
                                                    
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-orange h5 mb-20">
                                                            Edit Password
                                                        </h4>
                                                        <form method='POST' id='frm_password' class="password">
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Old Password</label>
                                                                <input type="password" autocomplete="off" class="form-control" required id="old_password" name="input[old_password]" placeholder="Old Password">
                                                            </div>
                                                            <input type="hidden" autocomplete="off" value="<?= $_SESSION['mp_user_id'] ?>" name="input[user_id]" class="form-control" >
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">New Password</label>
                                                                <input type="password" autocomplete="off" class="form-control" required name="input[new_password]" id="new_password" placeholder="New Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                                                <input type="password" autocomplete="off" class="form-control" required id="confirm_password" name="input[confirm_password]" placeholder="Confirm Password">
                                                            </div>
                                                            <button type="submit" style="float: right;" id="" class="btn btn-warning me-2">Save</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>

    $(function () {
        $('#myTab a').click(function (e) {
            e.preventDefault()
            $(this).tab('show');
        });
    });
    
    getProfile();

    function getProfile() {
        var id = $("#hidden_id").val();
      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=Profile&q=view",
        data: {
          input: {
            id: id
          }
        },
        success: function(data) {
          var jsonParse = JSON.parse(data);
          const json = jsonParse.data;

          $("#hidden_id").val(id);

          $('.input-item').map(function() {
            //console.log(this.id);
            const id_name = this.id;
            this.value = json[id_name];
          });

        }
      });
    }

    $("#frm_username").submit(function(e) {
        e.preventDefault();

        $("#btn_username").prop('disabled', true);
        $("#btn_username").html("<span class='fa fa-spinner fa-spin'></span>");

        $.ajax({
          type: "POST",
          url: "controllers/sql.php?c=Profile&q=update_username",
          data: $("#frm_username").serialize(),
          success: function(data) {
            var json = JSON.parse(data);
            if (json.data == 1) {
              success_update();
            } else if (json.data == 2) {
                swal("Cannot proceed!", "Username already exists!", "warning");
            } else {
              failed_query(json);
            }

            $("#btn_username").prop('disabled', false);
            $("#btn_username").html("Save");
          }
        });
    });

    
    $("#frm_password").submit(function(e) {
      e.preventDefault();

      $("#btn_password").prop('disabled', true);
      $("#btn_password").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

      var new_password = $("#new_password").val();
      var confirm_password = $("#confirm_password").val();
      
      if(new_password != confirm_password){
        swal("Can't change password!", "Confirm password doesn't match New password", "warning");
      }else{
        $.ajax({
          type: "POST",
          url: "controllers/sql.php?c=Profile&q=update_password",
          data: $("#frm_password").serialize(),
          success: function(data) {
            var json = JSON.parse(data);
            if (json.data == 1) {
              success_update();
            } else if (json.data == 2) {
              swal("Can't change password!", "Incorrect Password", "warning");
            } else {
              failed_query(json);
            }

            $("#btn_password").prop('disabled', false);
            $("#btn_password").html("Save");
          }
        });
      }
    });

    $("#frm_profile").submit(function(e) {
      e.preventDefault();

      $("#btn_submit").prop('disabled', true);
      $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

      var hidden_id = $("#hidden_id").val();
      var q = hidden_id > 0 ? "edit" : "add";
      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=Profile&q=edit",
        data: $("#frm_profile").serialize(),
        success: function(data) {
          var json = JSON.parse(data);
          if (json.data == 1) {
            success_update();
          } else if (json.data == 2) {
            entry_already_exists();
          } else {
            failed_query(json);
          }

          $("#btn_submit").prop('disabled', false);
          $("#btn_submit").html("Update Information");
        }
      });
    });

</script>