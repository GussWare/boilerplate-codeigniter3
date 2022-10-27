<h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
    <div> <span class="text-muted font-weight-light"><?php echo lang('modules_title'); ?> /</span> <?php echo lang("modules_list"); ?> </div>
    <a href="<?php echo base_url('modules/form');?>" type="button" class="btn btn-primary rounded-pill d-block"><span class="ion ion-md-add"></span>&nbsp;
        <?php echo lang('modules_crear_module') ?></a>
</h4>


<!-- Filters -->
<div class="card">
    <h6 class="card-header">
        <?php echo lang('actions_advanced_search'); ?>
    </h6>
    <div class="px-4 pt-4 mb-4">
        <form id="modules-advanced-search">
            <div class="form-row">
                <div class="col-md mb-4">
                    <label class="form-label"><?php echo lang("modules_name"); ?></label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="col-md mb-4">
                    <label class="form-label"><?php echo lang("modules_slug"); ?></label>
                    <input type="text" id="slug" name="slug" class="form-control">
                </div>
                <div class="col-md col-xl-2 mb-4">
                    <label class="form-label d-none d-md-block">&nbsp;</label>
                    <button type="button"
                        class="btn btn-default btn-block"><?php echo lang('actions_buscar'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- / Filters -->

<br /><br />

<div class="card">
    <h6 class="card-header">
        <?php echo lang('modules_list'); ?>
    </h6>

    <div class="card-datatable ">
        <div class="row">
            <div class="col-md-6">
                <form id="modules-frm-show" class="form-inline">
                    <div class="form-group mt-2 mb-2">
                        <label for="basic-table-mostrar" class="ml-3 mr-3"><?php echo lang('general_text_show'); ?> :</label>
                        <?php echo form_dropdown("limit", get_select_limit_pagination(), PAGINATION_LIMIT_PER_PAGE,'id="modules-pag-limit" class="custom-select"'); ?>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form id="modules-frm-search" class="form-inline d-flex justify-content-end mr-3">
                    <div class="form-group mt-2 mb-2 ">
                        <label for="basic-table-mostrar" class="mr-3"><?php echo lang('general_text_search') ?> :</label>
                        <input type="text" id="basic-table-search" name="search" class="form-control">
                        <button id="modules-pag-search" type="button" class="btn btn-default btn-grid-search">
                            <i class="fas fa-search d-block"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-md-12">
                <div class="modules-pages-container buttons-pagination"></div>
                <table id="table-modules" class="datatables-demo table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th data-name="id" style="width: 5%;"></th>
                            <th data-name="name" style="width: 25%;"><?php echo lang('modules_name'); ?></th>
                            <th data-name="slug" style="width: 25%;"><?php echo lang('modules_slug'); ?></th>
                            <th data-name="description" style="width: 30%;"><?php echo lang('modules_description'); ?></th>
                            <th data-name="enabled" style="width: 5%;"><?php echo lang('modules_enabled'); ?></th>
                            <th data-name="id" style="width: 10%;"><?php echo lang('actions_actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="modules-pages-container buttons-pagination"></div>
            </div>
        </div>
    </div>

</div>


<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag("assets/js/plugins/basictable/jquery.basictable.js"); ?>

<?php echo script_tag("assets/js/modules/sistema/modules/modules-api.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/modules/modules-actions.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/modules/modules-listado.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/modules.js"); ?>

<script type="text/javascript">
$(document).ready(function() {
    $.extend(modules, ModulesListado);

    var TableModules = null;

    modules.initListado();

});
</script>