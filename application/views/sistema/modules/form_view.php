<h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
    <div> <span class="text-muted font-weight-light"><?php echo lang('modules_title'); ?>
            /</span><?php echo lang('modules_crear_module'); ?> </div>
    <a href="<?php echo base_url('modules/index'); ?>" type="button" class="btn btn-secondary rounded-pill d-block"><span class="ion ion-md-arrow-back"></span>&nbsp;
        <?php echo lang('modules_list') ?></a>
</h4>

<form>
    <div class="card mb-4">
        <h6 class="card-header">
            <?php echo lang('general_data'); ?>
        </h6>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label"><?php echo lang("modules_name"); ?></label>
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label"><?php echo lang("modules_slug"); ?></label>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label"><?php echo lang("modules_description"); ?></label>
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
                <table id="table-list-actions" class="table product-discounts-edit">
                    <thead>
                        <tr>
                            <th style="width: 10%;"><?php echo lang('actions_id'); ?></th>
                            <th style="width: 20%;"><?php echo lang('actions_name'); ?></th>
                            <th style="width: 20%;"><?php echo lang('actions_slug'); ?></th>
                            <th style="width: 30%;"><?php echo lang('actions_description'); ?></th>
                            <th style="width: 10%;"><?php echo lang('actions_enabled'); ?></th>
                            <th style="width: 10%;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (count($actions) > 0) : ?>
                            <?php foreach ($actions as $action) : ?>
                                <tr>
                                    <td><?php echo $action->id; ?></td>
                                    <td><?php echo $action->name; ?></td>
                                    <td><?php echo $action->slug; ?></td>
                                    <td><?php echo $action->description; ?></td>
                                    <td><?php echo $action->enabled; ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6"><?php echo lang("genera_text_no_hay_registros"); ?></td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

            <button id="btn-add-actions" type="button" class="btn btn-outline-primary"><i class="ion ion-md-add"></i>&nbsp; <?php echo lang("actions_add_action"); ?></button>
        </div>
    </div>

    <div class="text-right mt-3">
        <a href="<?php echo base_url('modules/index'); ?>" class="btn btn-default"><?php echo lang("actions_cancel"); ?></a>&nbsp;
        <button type="button" class="btn btn-primary"><?php echo lang("actions_save_changes"); ?></button>
    </div>
</form>


<?php $this->load->view('sistema/actions/form_modal_view'); ?>


<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag("assets/js/plugins/basictable/jquery.basictable.js"); ?>

<?php echo script_tag("assets/js/modules/sistema/actions/actions-form.js"); ?>

<?php echo script_tag("assets/js/modules/sistema/modules/modules-api.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/modules/modules-actions.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/modules/modules-form.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/modules.js"); ?>

<script type="text/javascript">
    $(document).ready(function() {
        Modules_Form.init();
    });
</script>