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
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Name</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Name Authority</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Synonyms</th>
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
        $("#plant_img").prop("required", true);
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
                        return "<img src='vendors/file/" + row.plant_img + "' style='max-height: 80px !important;' onclick=previewImage('" + row.plant_img + "')>";
                    }
                },
                {
                    "data": "plant_name"
                },
                {
                    "data": "plant_name_authority"
                },
                {
                    "data": "plant_synonyms"
                },
                {
                    "data": "date_added"
                },
                {
                    "mRender": function(data, type, row) {
                        return '<div class="table-actions">' +
                            '<a onclick="getPlantDetails(' + row.plant_id + ')" data-color="#265ed7" style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>' +
                            '<a onclick="deleteEntry(' + row.plant_id + ')" data-color="#e95959" style="color: rgb(233, 89, 89);"><i class="icon-copy dw dw-delete-3"></i></a>' +
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
        $("#plant_img").prop("required", false);
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
                api_key: "4DL1S4fe6BCYhUm7TnZPe9gFBXGaWBm3JLXu3DNtGAaQlA6ZT8",
                images: base64files,
                // modifiers docs: https://github.com/flowerchecker/Plant-id-API/wiki/Modifiers
                modifiers: ["crops_fast", "similar_images"],
                plant_language: "en",
                // plant details docs: https://github.com/flowerchecker/Plant-id-API/wiki/Plant-details
                plant_details: ["common_names",
                    "url",
                    "name_authority",
                    "wiki_description",
                    "taxonomy",
                    "synonyms"
                ],
            };

            fetch('https://api.plant.id/v2/identify', {
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
                        console.log(data.suggestions[0]);
                        $("#canvas_probability").show();
                        $("#canvas_plant").show();
                        $("#btn_submit").show();

                        var k = data.suggestions[0];
                        $.ajax({
                            type: "POST",
                            url: "controllers/sql.php?c=" + route_settings.class_name + "&q=checker",
                            data: {
                                input: {
                                    plant_name: k['plant_name']
                                }
                            },
                            success: function(data) {
                                var json = JSON.parse(data);
                                if (json.data == -1) {
                                    $("#plantid").val(k['id']);
                                    $("#plant_name").val(k['plant_name']);
                                    $("#plant_name_authority").val(k['plant_details'].name_authority);
                                    $("#plant_synonyms").val(k['plant_details'].synonyms);
                                    $("#plant_taxonomy_class").val(k['plant_details'].taxonomy['class']);
                                    $("#plant_taxonomy_family").val(k['plant_details'].taxonomy['family']);
                                    $("#plant_taxonomy_genus").val(k['plant_details'].taxonomy['genus']);
                                    $("#plant_taxonomy_kingdom").val(k['plant_details'].taxonomy['kingdom']);
                                    $("#plant_taxonomy_order").val(k['plant_details'].taxonomy['order']);
                                    $("#plant_taxonomy_phylum").val(k['plant_details'].taxonomy['phylum']);
                                    $("#plant_description").val(k['plant_details'].wiki_description['value']);
                                    $("#hidden_id").val('');
                                } else {
                                    $("#plant_name").val(json.data['plant_name']);
                                    $("#hidden_id").val(json.data['plant_id']);

                                    $("#plantid").val(json.data['plantid']);
                                    $("#plant_name_authority").val(json.data['plantid']);
                                    $("#plant_synonyms").val(json.data['plant_synonyms']);
                                    $("#plant_taxonomy_class").val(json.data['plant_taxonomy_class']);
                                    $("#plant_taxonomy_family").val(json.data['plant_taxonomy_family']);
                                    $("#plant_taxonomy_genus").val(json.data['plant_taxonomy_genus']);
                                    $("#plant_taxonomy_kingdom").val(json.data['plant_taxonomy_kingdom']);
                                    $("#plant_taxonomy_order").val(json.data['plant_taxonomy_order']);
                                    $("#plant_taxonomy_phylum").val(json.data['plant_taxonomy_phylum']);
                                    $("#plant_description").val(json.data['plant_description']);
                                    $("#curable_diseases").val(json.data['curable_diseases']);
                                }
                                
                                $("#span_probability").html(k['probability']);
                            }
                        });

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
                    // console.error('Error:', error);

                    $("#btn_scan").prop("disabled", false);
                    $("#btn_scan").html("Scan");
                });
        })
    }

    var plant_checker


    $(document).ready(function() {
        getEntries();
    });
</script>