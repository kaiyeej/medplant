<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Plants</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="./">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Plants
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <button type="button" onclick="scanPlant()" class="btn btn-success mt-2 mt-sm-0 btn-icon-text">
                            <i class="fa fa-plus"></i> Add New
                        </button>

                    </div>

                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div id="dt_entries_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <table class="checkbox-datatable table hover data-table-export dataTable no-footer dtr-inline" id="dt_entries" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Image</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Assessment</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Common Name</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Date Added</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include "modal_image.php"; ?>
<?php include "modal_scan.php"; ?>
<script type="text/javascript">
    function scanPlant() {
        document.getElementById("frm_submit").reset();
        $("#modalEntry").modal("show");
        $(".div-scan").show();
        $("#canvas_plant").hide();
        $("#btn_submit").hide();
        $("#canvas_probability").hide();
        $("#canvas_healthy").hide();
        $("#assessment_img").prop("required", true);
    }

    function getEntries() {
        $("#dt_entries").DataTable().destroy();
        $("#dt_entries").DataTable({
            "processing": true,
            "ajax": {
                "url": "controllers/sql.php?c=" + route_settings.class_name + "&q=show",
                "dataSrc": "data"
            },
            'dom': 'Bfrtp',
            'buttons': [
                'copy', 'csv', 'pdf', 'print'
            ],
            "columns": [{
                    "mRender": function(data, type, row) {
                        return "<img src='vendors/assessment/" + row.assessment_img + "' style='max-height: 80px !important;' onclick=previewImage('" + row.assessment_img + "')>";
                    }
                },
                {
                    "data": "assessment_name"
                },
                {
                    "data": "assessment_common_name"
                },
                {
                    "data": "date_added"
                },
                {
                    "mRender": function(data, type, row) {
                        return '<div class="table-actions">' +
                            '<a onclick="getPlantDetails(' + row.assessment_id + ')" data-color="#265ed7" style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>' +
                            '<a onclick="deleteEntry(' + row.assessment_id + ')" data-color="#e95959" style="color: rgb(233, 89, 89);"><i class="icon-copy dw dw-delete-3"></i></a>' +
                            '</div>';
                    }


                }
            ]
        });
    }

    function getPlantDetails(id) {
        $(".div-scan").hide();
        $("#canvas_plant").show();
        $("#btn_submit").show();
        getEntryDetails(id);
        $("#canvas_propability").hide();
        $("#assessment_img").prop("required", false);
        $("#hidden_id").val(id);
    }

    function previewImage(doc_file) {
        var src = "vendors/file/" + doc_file;
        $("#img_doc").attr('src', src);
        $("#modalUpload").modal('show');
    }

    function sendIdentification() {
        $("#btn_scan").prop("disabled", true);
        $("#btn_scan").html("<span class='fa fa-spinner fa-spin'></span>");

        const files = [...document.querySelector('input[type=file]').files];
        const promises = files.map((file) => {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const res = event.target.result;
                    console.log(res);
                    resolve(res);
                }
                reader.readAsDataURL(file)
            })
        })

        Promise.all(promises).then((base64files) => {
            console.log(base64files)

            const data = {
                api_key: "q10yUB5d4CeEX0HMvsSmGdjikogR7kX4oW8idHOfJeqWHy0mnW",
                images: base64files,
                // modifiers docs: https://github.com/flowerchecker/Plant-id-API/wiki/Modifiers
                modifiers: ["crops_fast", "similar_images"],
                language: "en",
                // disease details docs: https://github.com/flowerchecker/Plant-id-API/wiki/Disease-details
                disease_details: ["cause",
                    "common_names",
                    "classification",
                    "description",
                    "treatment",
                    "url"
                ],
            };

            fetch('https://api.plant.id/v2/health_assessment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.is_plant == true) {
                        console.log('Success:', data);
                        //console.log(data.health_assessment['diseases']);
                        $("#canvas_probability").show();
                        $("#canvas_healthy").show();
                        $("#canvas_plant").show();
                        $("#btn_submit").show();
                        var k = data.health_assessment['diseases'][0];
                        $("#entity_id").val(k['id']);

                        if(data.health_assessment['is_healthy'] == true){
                            $("#span_healthy").html("<strong> Healthy </strong>");
                            $("#is_healthy").val(1);
                        }else{
                            $("#span_healthy").html("<strong style='color: #f44336;'> Not Healthy </strong>");
                            $("#is_healthy").val(0);
                        }

                        $("#span_probability").html(k['probability']*100);
                        $("#assessment_name").val(k['name']);
                        $("#assessment_common_name").val(k['disease_details'].common_names[0]);
                        $("#assessment_description").val(k['disease_details'].description);
                        $("#assessment_biological").val(k['disease_details'].treatment['biological']);
                        $("#assessment_prevention").val(k['disease_details'].treatment['prevention']);
                        
                    } else {
                        swal("Cannot proceed!", "Item is not a plant.", "warning");
                        $("#canvas_plant").hide();
                        $("#canvas_probability").hide();
                        $("#btn_submit").hide();
                    }

                    $("#btn_scan").prop("disabled", false);
                    $("#btn_scan").html("Scan");

                })
                .catch((error) => {
                    //console.error('Error:', error);

                    $("#btn_scan").prop("disabled", false);
                    $("#btn_scan").html("Scan");
                });
        })
    }

    $(document).ready(function() {
        getEntries();
    });
</script>