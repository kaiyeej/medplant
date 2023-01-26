<form method='POST' id='frm_health_submit'>
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon-edit'></i> Health Assessment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <div id="ha_camera"></div>
                                <div id="ha_result"></div>
                                <br />
                                <input type="hidden" class="assessment_img" name="input[assessment_img]" id="assessment_img">

                                <button id="btn_ha_scan" class="btn btn-success" onClick="take_snapshot()"><i class="bi bi-camera-fill"></i> Capture and Scan</button>
                            </center>
                        </div>
                    </div>

                    <div class="row div-scan">
                        <div class="col-lg-12">
                            <span id="canvas_probability" class="badge badge-info">Probability: <strong id="span_probability"></strong></span>
                            <span class="badge badge-info" id="canvas_healthy">Status: <span id="span_healthy"></span></span>
                        </div>
                    </div>
                    <hr class="div-scan">
                    <input type="hidden" id="hidden_id" name="input[assessment_id]">
                    <input type="text" class="form-control input-item" id="entity_id" name="input[entity_id]">
                    <input type="hidden" class="form-control input-item" id="is_healthy" name="input[is_healthy]">
                    <div class="row" id="canvas_plant">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Assessment <span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[assessment_name]" id="assessment_name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Common Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[assessment_common_name]" id="assessment_common_name" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Biological<span class="text-danger">*</span></label>
                                <textarea class="form-control input-item" style="height: 100px;" name="input[assessment_biological]" id="assessment_biological" autocomplete="off"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prevention<span class="text-danger">*</span></label>
                                <textarea class="form-control input-item" name="input[assessment_prevention]" id="assessment_prevention" autocomplete="off" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description<span class="text-danger">*</span></label>
                                <textarea class="form-control input-item" name="input[assessment_description]" id="assessment_description" autocomplete="off" style="height: 100px;">></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="btn_submit" class="btn btn-success">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $("#frm_health_submit").submit(function(e) {
        e.preventDefault();

        $("#btn_submit").prop('disabled', true);
        $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

        var hidden_id = $("#hidden_id").val();
        $.ajax({
            type: "POST",
            url: "controllers/sql.php?c=HealthAssessment&q=scan",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                getEntries();
                var json = JSON.parse(data);
                if (route_settings.has_detail == 1) {
                    if (json.data > 0) {
                        $("#modalEntry").modal('hide')
                        hidden_id > 0 ? success_update() : success_add();
                        hidden_id > 0 ? $("#modalEntry2").modal('hide') : '';
                        hidden_id > 0 ? getEntryDetails2(hidden_id) : getEntryDetails2(json.data);
                        
                    } else if (json.data == -2) {
                        entry_already_exists();
                    } else if (json.data > 0) {
                        getPlantDetails(json.data);
                    } else {
                        failed_query(json);
                    }
                    setTimeout(function() {
                        location.reload()
                    }, 3000);
                } else {
                    if (json.data == 1) {
                        hidden_id > 0 ? success_update() : success_add();
                        $("#modalEntry").modal('hide');
                    } else if (json.data == 2) {
                        entry_already_exists();
                    } else {
                        failed_query(json);
                    }
                    setTimeout(function() {
                        location.reload()
                    }, 3000);
                }
                $("#btn_submit").prop('disabled', false);
                $("#btn_submit").html("Save");
            }
        });
    });
</script>