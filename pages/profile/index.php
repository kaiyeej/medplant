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
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
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
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
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
                                                            <input class="form-control form-control-lg input-item" id="user_fname" name="input[user_fname]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="weight-500 col-md-4">
                                                        <div class="form-group">
                                                            <label>Middle Name</label>
                                                            <input class="form-control form-control-lg input-item" id="user_mname" name="input[user_mname]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="weight-500 col-md-4">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input class="form-control form-control-lg input-item" id="user_lname" name="input[user_lname]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="weight-500 col-md-6">
                                                        <div class="form-group">
                                                            <label>Contact #</label>
                                                            <input class="form-control form-control-lg input-item" id="user_contact_num" name="input[user_contact_num]" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="weight-500 col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control form-control-lg" id="user_email" name="input[user_email]" type="email">
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
                                            <form>
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">
                                                            Edit Your Personal Setting
                                                        </h4>
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control form-control-lg" type="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date of birth</label>
                                                            <input class="form-control form-control-lg date-picker" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <div class="d-flex">
                                                                <div class="custom-control custom-radio mb-5 mr-20">
                                                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                                    <label class="custom-control-label weight-400" for="customRadio4">Male</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-5">
                                                                    <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                                                    <label class="custom-control-label weight-400" for="customRadio5">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <div class="dropdown bootstrap-select form-control form-control-lg"><select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" tabindex="-98">
                                                                    <option class="bs-title-option" value=""></option>
                                                                    <option>United States</option>
                                                                    <option>India</option>
                                                                    <option>United Kingdom</option>
                                                                </select><button type="button" class="btn dropdown-toggle btn-outline-secondary btn-lg bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-3" aria-haspopup="listbox" aria-expanded="false" title="Not Chosen">
                                                                    <div class="filter-option">
                                                                        <div class="filter-option-inner">
                                                                            <div class="filter-option-inner-inner">Not Chosen</div>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                                <div class="dropdown-menu ">
                                                                    <div class="inner show" role="listbox" id="bs-select-3" tabindex="-1">
                                                                        <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>State/Province/Region</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Visa Card Number</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Paypal ID</label>
                                                            <input class="form-control form-control-lg" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox mb-5">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1-1">
                                                                <label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification
                                                                    emails</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary" value="Update Information">
                                                        </div>
                                                    </li>
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">
                                                            Edit Social Media links
                                                        </h4>
                                                        <div class="form-group">
                                                            <label>Facebook URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Twitter URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Linkedin URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Instagram URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Dribbble URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Dropbox URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Google-plus URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pinterest URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Skype URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Vine URL:</label>
                                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary" value="Save &amp; Update">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </form>
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

  getProfile("<?= $_SESSION['md_user_id'] ?>");
  function getProfile(id) {
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