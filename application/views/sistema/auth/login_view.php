<form id="form-login" class="my-5" action="<?php echo base_url("auth/login"); ?>" method="POST">
    <div id="alert-messages"></div>

    <div class="form-group">
        <label class="form-label"><?php echo lang("auth_email") ?></label>
        <input id="email" name="email" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label d-flex justify-content-between align-items-end">
            <div><?php echo lang("auth_password") ?></div>
            <a href="<?php echo base_url('auth/forgot-password'); ?>" class="d-block small"><?php echo lang("auth_forgot_pass") ?></a>
        </label>
        <input id="password" name="password" type="password" class="form-control">
    </div>

    <div class="d-flex justify-content-between align-items-center m-0">
        <label class="custom-control custom-checkbox m-0">
            <input type="checkbox" class="custom-control-input">
            <span class="custom-control-label"><?php echo lang("auth_remember_me") ?></span>
        </label>
        <button type="submit" class="btn btn-primary"><?php echo lang("auth_sign_in") ?></button>
    </div>
</form>

<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag('assets/vendor/libs/validate/validate.js'); ?>
<?php echo script_tag('assets/js/plugins/ajaxForm/jquery.ajaxForm.js'); ?>
<?php echo script_tag('assets/js/modules/sistema/login.js'); ?>

<script type="text/javascript">
    $(document).ready(function() {

        login.initForm({
            form: {
                ignore: '.ignore, .select2-input',
                focusInvalid: false,
                rules: {
                    password: {
                        required: true,
                    },
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

        $("#form-login").submit(login.login);
    });
</script>