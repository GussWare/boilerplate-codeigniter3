<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo">
        <span class="app-brand-logo demo bg-primary">
            <?php $this->load->view(LAYOUT_DEFAULT . "svg_view");  ?>
        </span>
        <a href="index.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Appwork</a>
        <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>

    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->
        <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-speedometer"></i>
                <div>Dashboards</div>
            </a>

            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="index.html" class="sidenav-link">
                        <div>Dashboard 1</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</div>