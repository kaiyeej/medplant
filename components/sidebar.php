<?php 
$request = $_SERVER['REQUEST_URI'];
$page = str_replace("/medplant/", "", $request);
?>
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="./">
            <img src="vendors/logo/logo2.png" alt="" style="height: 70px;" class="dark-logo" />
            <span style="color:black;">&nbsp;MedPlants</span>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="./" class="dropdown-toggle no-arrow <?= $page == "" || $page == "homepage" ? "active" : "" ; ?>">
                        <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="./health-assessment" class="dropdown-toggle no-arrow <?= $page == "health-assessment" ? "active" : "" ; ?>">
                        <span class="micon bi bi-list-columns-reverse"></span><span class="mtext">Health Assessment</span>
                    </a>
                </li>
                <li>
                    <a href="./plants" class="dropdown-toggle no-arrow <?= $page == "plants" ? "active" : "" ; ?>">
                        <span class="micon bi bi-tree"></span><span class="mtext">Plants</span>
                    </a>
                </li>
                <li>
                    <a href="./users" class="dropdown-toggle no-arrow <?= $page == "users" ? "active" : "" ; ?>">
                        <span class="micon bi bi-person-plus"></span><span class="mtext">Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>