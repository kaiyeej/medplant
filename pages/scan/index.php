<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Scan</h3>
                        <hr>
                    </div>
                    <div class="col-md-6" style="text-align: center;padding: 40px;">
                        <button type="button" style="width: 200px;padding: 20px;" onclick="scanHealth()" class="btn btn-lg btn-success mt-2 mt-sm-0 btn-icon-text">
                            Health Assessment
                        </button>
                    </div>
                    <div class="col-md-6" style="text-align: center;padding: 40px;">
                        <button type="button" style="width: 200px;padding: 20px;" onclick="scanPlant()" class="btn btn-lg btn-info mt-2 mt-sm-0 btn-icon-text">
                            Plants
                        </button>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "modal_plants_scan.php"; ?>
<?php include "modal_health_scan.php"; ?>
<script type="text/javascript">
    function scanPlant() {
        document.getElementById("frm_plants_submit").reset();
        $("#modalPlants").modal("show");
        $(".div-scan").show();
        $("#canvas_plant2").hide();
        $("#btn_submit").hide();
        $("#canvas_probability2").hide();
        $("#plant_img").prop("required", true);

        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#plant_camera');
    }

    function take_snapshot2() {
        Webcam.snap(function(data_uri) {
            $("#plant_img").val(data_uri);
            document.getElementById('plant_result').innerHTML = '<img src="' + data_uri + '"/>';
        });

        $("#plant_camera").hide();
        sendIdentificationPlant();
    }

    function sendIdentificationPlant() {
        $("#btn_plant_scan").prop("disabled", true);
        $("#btn_plant_scan").html("<span class='fa fa-spinner fa-spin'></span>");


        var plant_img = $("#plant_img").val();

        var a_img = btoa(plant_img);
        var promises = atob(a_img);

        const data = {
            api_key: "eqrx10kK3Oz53iDgiZytx1q71pr6Mk1hnbIZCFuZIECchVuW0D",
            images: [promises],
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
                    $("#btn_submit2").show();

                    var k = data.suggestions[0];
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
                    $("#span_probability").html(k['probability']);

                } else {
                    swal("Cannot proceed!", "Item is not a plant.", "warning");
                    $("#canvas_plant").hide();
                    $("#canvas_probability").hide();
                    $("#btn_submit2").hide();
                }

                $("#btn_scan").prop("disabled", false);
                $("#btn_scan").html("Scan");

            })
            .catch((error) => {
                console.error('Error:', error);

                $("#btn_scan").prop("disabled", false);
                $("#btn_scan").html("Scan");
            });
    }

    function scanHealth() {
        document.getElementById("frm_health_submit").reset();
        $("#modalEntry").modal("show");
        $(".div-scan").show();
        $("#canvas_plant").hide();
        $("#btn_submit").hide();
        $("#canvas_probability").hide();
        $("#canvas_healthy").hide();
        $("#plant_img").prop("required", true);


        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#ha_camera');
    }

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $("#assessment_img").val(data_uri);
            document.getElementById('ha_result').innerHTML = '<img src="' + data_uri + '"/>';
        });

        $("#ha_camera").hide();
        sendIdentification();
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
        $("#btn_ha_scan").prop("disabled", true);
        $("#btn_ha_scan").html("<span class='fa fa-spinner fa-spin'></span>");

        var assessment_img = $("#assessment_img").val();

        var a_img = btoa(assessment_img);
        var promises = atob(a_img);

        console.log(promises);

        const data = {
            api_key: "eqrx10kK3Oz53iDgiZytx1q71pr6Mk1hnbIZCFuZIECchVuW0D",
            images: [promises],
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
                    var k = data.health_assessment['diseases'][0];

                    if (k['name'] == "") {
                        swal("Cannot proceed!", "Item is not a plant.", "warning");
                        $("#canvas_plant").hide();
                        $("#canvas_probability").hide();
                        $("#btn_submit").hide();
                    } else {
                        //console.log(data.health_assessment['diseases']);
                        $("#canvas_probability").show();
                        $("#canvas_healthy").show();
                        $("#canvas_plant").show();
                        $("#btn_submit").show();
                        $("#entity_id").val(data.id);

                        if (data.health_assessment['is_healthy'] == true) {
                            $("#span_healthy").html("<strong> Healthy </strong>");
                            $("#is_healthy").val('');
                        } else {
                            $("#span_healthy").html("<strong style='color: #f44336;'> Not Healthy </strong>");
                            $("#is_healthy").val(0);
                        }

                        $("#span_probability").html(k['probability'] * 100);
                        $("#assessment_name").val(k['name']);
                        if (k['disease_details'].common_names != null) {
                            $("#assessment_common_name").val(k['disease_details'].common_names[0]);
                        } else {
                            $("#assessment_common_name").val('');
                        }
                        $("#assessment_description").val(k['disease_details'].description);
                        $("#assessment_biological").val(k['disease_details'].treatment['biological']);
                        $("#assessment_prevention").val(k['disease_details'].treatment['prevention']);
                    }


                } else {
                    swal("Cannot proceed!", "Item is not a plant.", "warning");
                    $("#canvas_plant").hide();
                    $("#canvas_probability").hide();
                    $("#btn_submit").hide();
                }

                $("#btn_ha_scan").prop("disabled", false);
                $("#btn_ha_scan").html("Scan");

            })
            .catch((error) => {
                //console.error('Error:', error);

                $("#btn_ha_scan").prop("disabled", false);
                $("#btn_ha_scan").html("Scan");
            });
    }

    $(document).ready(function() {
        getEntries();
    });
</script>