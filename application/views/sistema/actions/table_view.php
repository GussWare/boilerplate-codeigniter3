<div class="card mb-4">
    <h6 class="card-header">
        <?php echo lang('actions_list'); ?>
    </h6>
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-list-actions" class="table product-discounts-edit">
                <thead>
                    <tr>
                        <th style="width: 20%;"><?php echo lang('actions_name'); ?></th>
                        <th style="width: 20%;"><?php echo lang('actions_slug'); ?></th>
                        <th style="width: 30%;"><?php echo lang('actions_description'); ?></th>
                        <th style="width: 10%;"><?php echo lang('actions_enabled'); ?></th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <button id="btn-add-actions" type="button" class="btn btn-outline-primary"><i class="ion ion-md-add"></i>&nbsp; <?php echo lang("actions_add_action"); ?></button>
    </div>
</div>