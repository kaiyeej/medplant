<?php
    $Home = new Homepage();
?>
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Overview</h2>
        </div>
        <div class="row">
            <div class="col-xl-12" style="height:90%;">
                <div class="card-box height-100-p mb-30">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img style="height: 200px;" src="vendors/logo/logo2.png" alt="">
                        </div>
                        <div class="col-md-9">
                            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                                Welcome back <div class="weight-600 font-30 text-blue"><span class="main_username_label"></span>!</div>
                            </h4>
                            <p class="font-18 max-width-600">MedPlants - Herbal Plants Information</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $Home->total_user(); ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Users
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf">
                                        <i class="icon-copy ti-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $Home->total_plant(); ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Total Plant
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b">
                                        <span class="icon-copy bi bi-tree"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $Home->total_assessment(); ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Total Health Assessment
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ffeb3b">
                                        <span class="icon-copy bi bi-list-columns-reverse"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>