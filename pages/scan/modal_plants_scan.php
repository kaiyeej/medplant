<form method='POST' id='frm_plants_submit'>
    <div class="modal fade" id="modalPlants" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon-edit'></i> Plant</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <div id="plant_camera"></div>
                                <div id="plant_result"></div>
                                <br />
                                <input type="text" class="plant_img" name="input[plant_img]" id="plant_img">

                                <button id="btn_plant_scan" class="btn btn-success" onClick="take_snapshot2()"><i class="bi bi-camera-fill"></i> Capture and Scan</button>
                            </center>
                        </div>
                    </div>
                    <hr class="div-scan">
                    <input type="hidden" id="hidden_id" name="input[plant_id]">
                    <input type="hidden" class="form-control input-item" id="plantid" name="input[plantid]">
                    <div class="row" id="canvas_plant2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[plant_name]" id="plant_name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name Authority<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[plant_name_authority]" id="plant_name_authority" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Synonyms<span class="text-danger">*</span></label>
                                <textarea class="form-control input-item" name="input[plant_synonyms]" id="plant_synonyms" autocomplete="off" style="height: 100px;" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Taxonomy Class<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[plant_taxonomy_class]" id="plant_taxonomy_class" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Taxonomy Family<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[plant_taxonomy_family]" id="plant_taxonomy_family" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Taxonomy Genus<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[plant_taxonomy_genus]" id="plant_taxonomy_genus" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Taxonomy Kingdom<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[plant_taxonomy_kingdom]" id="plant_taxonomy_kingdom" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Taxonomy Order<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[plant_taxonomy_order]" id="plant_taxonomy_order" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Taxonomy Phylum<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[plant_taxonomy_phylum]" id="plant_taxonomy_phylum" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control input-item" name="input[plant_description]" id="plant_description" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="btn_submit2" style="display:none;" class="btn btn-success">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>