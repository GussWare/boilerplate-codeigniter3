<h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
    <div>
        <span class="text-muted font-weight-light"><?php echo lang('modules_title'); ?> /</span>
        <?php echo lang("modules_list"); ?>

    </div>
    <a href="<?php echo base_url('modules/form');?>" type="button" class="btn btn-primary rounded-pill d-block"><span
            class="ion ion-md-add"></span>&nbsp;
        <?php echo lang('actions_create_new') ?></a>
</h4>

<br /><br />

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h6 class="card-header">
                <?php echo lang('modules_list'); ?>
            </h6>

            <div class="card-datatable ">
                <div class="row">
                    <div class="col-md-6">
                        <form id="modules-frm-show" class="form-inline">
                            <div class="form-group mt-2 mb-2">
                                <label for="basic-table-mostrar"
                                    class="ml-3 mr-3"><?php echo lang('general_text_show'); ?> :</label>
                                <?php echo form_dropdown("limit", get_select_limit_pagination(), PAGINATION_LIMIT_PER_PAGE, 'id="modules-pag-limit" class="custom-select"'); ?>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form id="modules-frm-search" class="form-inline d-flex justify-content-end mr-3">
                            <div class="form-group mt-2 mb-2 ">
                                <label for="basic-table-mostrar" class="mr-3"><?php echo lang('general_text_search') ?>
                                    :</label>
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
                        <table id="modules-table"
                            class="datatables-demo table table-striped table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th data-name="id" style="width: 5%;"></th>
                                    <th data-name="name" style="width: 25%;"><?php echo lang('modules_name'); ?></th>
                                    <th data-name="slug" style="width: 25%;"><?php echo lang('modules_slug'); ?></th>
                                    <th data-name="description" style="width: 30%;">
                                        <?php echo lang('modules_description'); ?></th>
                                    <th data-name="enabled" style="width: 5%;"><?php echo lang('modules_enabled'); ?></th>
                                    <th style="width: 10%;"><?php echo lang('actions_actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="modules-pages-container buttons-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="template-table-modules" type="text/x-handlebars-template">
    <tr>
                <td>{{id}}</td>
                <td>{{name}}</td>
                <td>{{slug}}</td>
                <td>{{description}}</td>
                <td>{{enabled}}</td>
                <td>
                    <a class="btn-edit" href="javascript:void(0);">Editar</a>
                    <a class="btn-delete" href="javascript:void(0);">Eliminar</a>
                </td>
            </tr>
     </script>

<script id="template-pages-modules" type="text/x-handlebars-template">
    <div class="row">
            <div class="col-md-6">{{textDescription}}</div>
            <div class="col-md-6">
                <nav>
                    <ul class="pagination justify-content-end">
                        <li class="item-go-page page-item item-start {{#if buttons.start.disabled}} disabled {{/if}}" data-page="{{buttons.start.page}}"><a href="javascript:void(0)"
                                class="page-link">{{buttons.start.text}}</a></li>


                        <li class="item-go-page page-item item-back {{#if buttons.back.disabled}} disabled {{/if}}" data-page="{{buttons.back.page}}" ><a href="javascript:void(0)" class="page-link">{{buttons.back.text}}</a></li>


                        {{#each buttons.pages}}
                                <li class="item-go-page page-item {{#if active}} active {{/if}} {{#if disabled}} disabled {{/if}}" data-page="{{page}}" ><a href="javascript:void(0)"
                                    class="page-link">{{text}}</a></li>         
                        {{/each}}

                        
                        <li class="item-go-page item-next  {{#if buttons.next.disabled}} disabled {{/if}}" data-page="{{buttons.next.page}}" ><a href="javascript:void(0)" class="page-link">{{buttons.next.text}}</a></li>

                        <li class="item-go-page item-end {{#if buttons.end.disabled}} disabled {{/if}}" data-page="{{buttons.end.page}}" ><a href="javascript:void(0)"
                                class="page-link">{{buttons.end.text}}</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </script>

<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag("assets/js/modules/sistema/modules.js"); ?>