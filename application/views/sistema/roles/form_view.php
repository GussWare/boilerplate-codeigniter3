<h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
    <div> 
        <span class="text-muted font-weight-light"><?php echo lang('roles_title'); ?> /</span><?php echo lang('roles_crear_rol'); ?> 
    </div>
    <a href="<?php echo base_url('roles/index'); ?>" type="button" class="btn btn-secondary rounded-pill d-block">
        <span class="ion ion-md-arrow-back"></span>&nbsp;
        <?php echo lang('roles_list') ?>
    </a>
</h4>

<form id="form-roles">
    <div class="card mb-4">
        <h6 class="card-header">
            <?php echo lang('general_data'); ?>
        </h6>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label"><?php echo lang("roles_name"); ?></label>
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label"><?php echo lang("roles_slug"); ?></label>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label"><?php echo lang("roles_description"); ?></label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <h6 class="card-header">
            <?php echo lang('actions_list'); ?>
        </h6>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table product-discounts-edit">
                    <thead>
                        <tr>
                            <th><?php echo lang('actions_name'); ?></th>
                            <th><?php echo lang('actions_slug'); ?></th>
                            <th><?php echo lang('actions_description'); ?></th>
                            <th><?php echo lang('actions_enabled'); ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(count($actions) > 0): ?>
                            <?php foreach($actions AS $action): ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5"><?php echo lang("genera_text_no_hay_registros"); ?></td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-outline-primary"><i class="ion ion-md-add"></i>&nbsp; Add discount</button>
        </div>
    </div>
</form>



<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag("assets/js/plugins/basictable/jquery.basictable.js"); ?>

<?php echo script_tag("assets/js/modules/sistema/roles/roles-api.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/roles/roles-actions.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/roles/roles-listado.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/roles.js"); ?>

<script type="text/javascript">
    $(document).ready(function() {

    });
</script>