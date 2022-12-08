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
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Plants
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="icon-copy fa fa-cog" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" onclick="addModal()"><i class="icon-copy fa fa-plus" aria-hidden="true"></i> Add New</a>
                                <a class="dropdown-item" href="#" onclick='deleteEntry()'><i class="icon-copy fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div id="dt_entries_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <table class="checkbox-datatable table hover data-table-export nowrap dataTable no-footer dtr-inline" id="dt_entries" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="dt-body-center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                    <div class="dt-checkbox">
                                        <input type="checkbox" onchange="checkAll(this, 'dt_id')" name="select_all" value="1" id="example-select-all">
                                        <span class="dt-checkbox-label"></span>
                                    </div>
                                </th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Name</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Description</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Image</th>
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1">Date Last Modified</th>
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
<?php include "modal_plants.php"; ?>
<?php include "modal_image.php"; ?>
<script type="text/javascript">
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
                        return "<div class='dt-checkbox'><input type='checkbox' class='dt_id' name='id[]' value='" + row.plant_id + "'style='position: initial; opacity:1;'></div>";
                    }
                },
                {
                    "data": "plant_name"
                },
                {
                    "data": "plant_description"
                },
                {
                    "mRender": function(data, type, row) {
                        return "<img src='vendors/file/" + row.plant_img + "' style='max-height: 35px !important;' onclick=previewImage('" + row.plant_img + "')>";
                    }
                },
                {
                    "data": "date_last_modified"
                }
            ]
        });
    }

    function previewImage(doc_file) {
        var src = "vendors/file/"+doc_file;
        $("#img_doc").attr('src',src);
        $("#modalUpload").modal('show');
    }

    $(document).ready(function() {
        getEntries();
    });
</script>