<h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
    <div> <span class="text-muted font-weight-light"><?php echo lang('roles_title'); ?> /</span> <?php echo lang("roles_list"); ?> </div>
    <a href="<?php echo base_url('roles/form');?>" type="button" class="btn btn-primary rounded-pill d-block"><span class="ion ion-md-add"></span>&nbsp;
        <?php echo lang('roles_crear_rol') ?></a>
</h4>


<!-- Filters -->
<div class="card">
    <h6 class="card-header">
        <?php echo lang('actions_advanced_search'); ?>
    </h6>
    <div class="px-4 pt-4 mb-4">
        <form id="roles-advanced-search">
            <div class="form-row">
                <div class="col-md mb-4">
                    <label class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="col-md mb-4">
                    <label class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control">
                </div>
                <div class="col-md mb-4">
                    <label class="form-label">Created date</label>
                    <input type="text" id="tickets-list-created" class="form-control">
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
        <?php echo lang('roles_list'); ?>
    </h6>

    <div class="card-datatable ">
        <div class="row">
            <div class="col-md-6">
                <form id="roles-frm-show" class="form-inline">
                    <div class="form-group mt-2 mb-2">
                        <label for="basic-table-mostrar" class="ml-3 mr-3"><?php echo lang('general_text_show'); ?> :</label>
                        <?php echo form_dropdown("limit", get_select_limit_pagination(), PAGINATION_LIMIT_PER_PAGE,'id="roles-pag-limit" class="custom-select"'); ?>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form id="roles-frm-search" class="form-inline d-flex justify-content-end mr-3">
                    <div class="form-group mt-2 mb-2 ">
                        <label for="basic-table-mostrar" class="mr-3"><?php echo lang('general_text_search') ?> :</label>
                        <input type="text" id="basic-table-search" name="search" class="form-control">
                        <button id="roles-pag-search" type="button" class="btn btn-default btn-grid-search">
                            <i class="fas fa-search d-block"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-md-12">
                <div class="roles-pages-container buttons-pagination"></div>
                <table id="table-roles" class="datatables-demo table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th data-name="id" style="width: 5%;"></th>
                            <th data-name="name" style="width: 25%;"><?php echo lang('roles_name'); ?></th>
                            <th data-name="slug" style="width: 25%;"><?php echo lang('roles_slug'); ?></th>
                            <th data-name="description" style="width: 30%;"><?php echo lang('roles_description'); ?></th>
                            <th data-name="enabled" style="width: 5%;"><?php echo lang('roles_enabled'); ?></th>
                            <th data-name="id" style="width: 10%;"><?php echo lang('actions_actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="roles-pages-container buttons-pagination"></div>
            </div>
        </div>
    </div>

</div>


<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag("assets/js/plugins/basictable/jquery.basictable.js"); ?>

<?php echo script_tag("assets/js/modules/sistema/roles/roles-api.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/roles/roles-actions.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/roles/roles-listado.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/roles.js"); ?>

<script type="text/javascript">
$(document).ready(function() {
    $.extend(roles, RolesListado);

    var TableRoles = null;

    roles.initListado();

});
</script>