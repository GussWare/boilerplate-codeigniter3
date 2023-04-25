<div id="modal-form-actions" class="modal fade" >
    <div class="modal-dialog modal-lg">
        <form id="form-actions" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?php echo lang("actions_add_action"); ?>
                </h5>
                <button type="button" class="close btn-actions-cancel"  aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label"><?php echo lang("actions_name"); ?></label>
                        <input id="action-name" name="name" type="text" class="form-control" >
                    </div>
                    <div class="form-group col">
                        <label class="form-label"><?php echo lang("actions_slug"); ?></label>
                        <input id="action-slug" name="slug" type="text" class="form-control" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label"><?php echo lang("actions_description"); ?></label>                        
                        <textarea id="action-description" name="description" class="form-control" rows="3" ></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-actions-cancel"><?php echo lang("actions_cancel"); ?></button>
                <button id="btn-actions-save" type="button" class="btn btn-primary"><?php echo lang("actions_save_changes"); ?></button>
            </div>
        </form>
    </div>
</div>