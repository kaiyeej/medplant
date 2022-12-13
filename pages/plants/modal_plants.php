<form method='POST' id='frm_submit'>
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon-edit'></i> Add Entry</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="hidden_id" name="input[plant_id]">
                        <div class="col-lg-6">
                            <div class="form-group">
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>File <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>