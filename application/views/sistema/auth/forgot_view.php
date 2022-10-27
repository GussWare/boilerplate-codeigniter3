<form id="form-forgot" class="my-5" action="<?php echo base_url("auth/forgot-password"); ?>" method="POST">
    <div id="alert-messages"></div>

    <div class="form-group">
        <label class="form-label">
            <div><?php echo lang("auth_email") ?></div>
        </label>
        <input id="email" name="email" type="text" class="form-control">
    </div>

    <div class="d-flex justify-content-between align-items-center m-0">
        <div class="custom-control custom-checkbox m-0"></div>
        <button type="submit" class="btn btn-primary"><?php echo lang("auth_forgot") ?></button>
    </div>
</form>

<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag('assets/vendor/libs/validate/validate.js'); ?>
<?php echo script_tag('assets/js/plugins/ajaxForm/jquery.ajaxForm.js'); ?>
<?php echo script_tag('assets/js/modules/sistema/forgot.js'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        forgot.initForm({
            form: {
                ignore: '.ignore, .select2-input',
                focusInvalid: false,
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                errorPlacement: CoreUI.FormValidate.validationErrorPlacement,
                highlight: CoreUI.FormValidate.validationHighlight,
                unhighlight: CoreUI.FormValidate.validationUnhighlight
            }
        });


        $("#form-forgot").submit(forgot.forgotPassword);
    });
</script>