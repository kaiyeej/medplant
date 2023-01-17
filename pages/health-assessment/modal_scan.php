<form method='POST' id='frm_submit'>
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon-edit'></i> Add Entry</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
                </div>
                <div class="modal-body">
                    <div class="row div-scan">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <input type="file" class="form-control" name="file" id="plant_img" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <button type="button" id="btn_scan" onclick="sendIdentification()" class="btn btn-success">
                                    Scan
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <span id="canvas_probability" class="badge badge-info">Probability: <strong id="span_probability"></strong></span>
                            <span class="badge badge-info" id="canvas_healthy">Status: <span id="span_healthy"></span></span>
                        </div>
                    </div>
                    <hr class="div-scan">
                    <input type="hidden" id="hidden_id" name="input[assessment_id]">
                    <input type="hidden" class="form-control input-item" id="entity_id" name="input[entity_id]">
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
                                <input type="text" class="form-control input-item" name="input[assessment_common_name]" id="assessment_common_name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Biological<span class="text-danger">*</span></label>
                                <textarea class="form-control input-item"  style="height: 100px;" name="input[assessment_biological]" id="assessment_biological" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prevention<span class="text-danger">*</span></label>
                                <textarea class="form-control input-item" name="input[assessment_prevention]" id="assessment_prevention" autocomplete="off" style="height: 100px;" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description<span class="text-danger">*</span></label>
                                <textarea class="form-control input-item" name="input[assessment_description]" id="assessment_description" autocomplete="off" style="height: 100px;" required>></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="btn_submit" style="display:none;" class="btn btn-success">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>