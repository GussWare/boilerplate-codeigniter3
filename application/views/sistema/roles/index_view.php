<h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
    <div><?php echo lang('roles_title'); ?></div>
    <button type="button" class="btn btn-primary rounded-pill d-block"><span class="ion ion-md-add"></span>&nbsp;
        <?php echo lang('actions_new') ?></button>
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
                    <label class="form-label">Priority</label>
                    <select class="custom-select">
                        <option>Any</option>
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>
                    </select>
                </div>
                <div class="col-md mb-4">
                    <label class="form-label">Status</label>
                    <select class="custom-select">
                        <option>Any</option>
                        <option>Open</option>
                        <option>Reopened</option>
                        <option>In progress</option>
                        <option>Closed</option>
                    </select>
                </div>
                <div class="col-md mb-4">
                    <label class="form-label">Created date</label>
                    <input type="text" id="tickets-list-created" class="form-control">
                </div>
                <div class="col-md col-xl-2 mb-4">
                    <label class="form-label d-none d-md-block">&nbsp;</label>
                    <button type="button"
                        class="btn btn-secondary btn-block"><?php echo lang('actions_buscar'); ?></button>
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
    <div class="card-datatable table-responsive">
        <table id="table-roles" class="datatables-demo table table-striped table-bordered"></table>
    </div>
</div>

<div id="test-pagination">
    <ul id="test-pagination-container"></ul>    
</div>



<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag("assets/js/plugins/basictable/jquery.basictable.js"); ?>
<?php echo script_tag("assets/js/modules/sistema/roles.js"); ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#test-pagination').pagination({
         pageSize: 2,
            dataSource: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            callback: function (data, pagination) {
                var html = template(data);
                $('#test-pagination-container').html(html);
            }
        });

    function template(data) {
        var html = [];
        
        for(var i in data) {
            html.push(['<li>','Dato -> ' + data[i],'</li>'].join(' '));
        }

        return html.join(" ");
    }


    $("#table-roles").BasicTable({
        headers: {
            "id": {
                "lang": "",
                "width": "10%",
            },
            "name": {
                "lang": "<?php echo lang('roles_name'); ?>",
                "width": "20%"
            },
            "slug": {
                "lang": "<?php echo lang('roles_slug'); ?>",
                "width": "20%"
            },
            "description": {
                "lang": "<?php echo lang('roles_description'); ?>",
                "width": "30%"
            },
            "enabled": {
                "lang": "<?php echo lang('roles_enabled'); ?>",
                "width": "10%"
            },
            "actions": {
                "lang": "<?php echo lang('actions_actions'); ?>",
                "width": "10%",
            },
        },
        serverSide: {
            url: "<?php echo base_url('roles/paginate'); ?>",
            advancedSearch: "#roles-advanced-search"
        },
    });

});
</script>