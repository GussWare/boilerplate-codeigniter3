<h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
    <div> <span class="text-muted font-weight-light"><?php echo lang($slug . '_title'); ?>
            /</span><?php echo lang($slug . '_crear_module'); ?> 
    </div>
    <a href="<?php echo base_url($slug . '/index'); ?>" type="button" class="btn btn-secondary rounded-pill d-block"><span class="ion ion-md-arrow-back"></span>&nbsp;
        <?php echo lang($slug . '_list') ?></a>
</h4>

<form id="form-<?php echo $slug; ?>">
    <div class="card mb-4">
        <h6 class="card-header">
            <?php echo lang('general_data'); ?>
        </h6>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col">
                    <label for="name" class="form-label"><?php echo lang($slug . "_name"); ?></label>
                    <input id="name-<?php echo $slug; ?>" name="name" type="text" class="form-control">
                </div>
                <div class=" form-group col">
                    <label class="form-label"><?php echo lang($slug . "_slug"); ?></label>
                    <input id="slug-<?php echo $slug; ?>" name="slug" type="text" class="form-control">
                </div>
            </div>
            <div class=" form-group">
                <label class="form-label"><?php echo lang($slug . "_description"); ?></label>
                <textarea id="description-<?php echo $slug; ?>" name="description" class="form-control" rows="3"></textarea>
            </div>
        </div>
    </div>

    <?php $this->load->view("sistema/actions/table_view"); ?>

    <div class=" text-right mt-3">
        <button id="btn-cancel-modules" type="button" class="btn btn-default"><?php echo lang("actions_cancel"); ?></button>&nbsp;
        <button id="btn-save-modules" type="button" class="btn btn-primary"><?php echo lang("actions_save_changes"); ?></button>
    </div>
</form>


<?php $this->load->view('sistema/actions/form_modal_view'); ?>

<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag("assets/js/modules/sistema/actions.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/modules.js"); ?>

<script type="text/javascript">
    var slug = "<?php echo $slug; ?>";
    var tableJsonActions = '<?php echo json_encode($actions); ?>';

    $(document).ready(function() {
        const actions = new Actions();
        const modules = new Modules();
    });
</script>