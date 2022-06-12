<form id="form_login" class="my-5" action="<?php echo base_url("sistema/auth/login"); ?>" method="POST">
    <div class="form-group">
        <label class="form-label"><?php echo lang("auth_email") ?></label>
        <input id="email" name="email" type="email" class="form-control">
        <label id="email-error" class="error" for="cCorreo" style="display: none; text-align: left; width: 100%;"></label>
    </div>
    <div class="form-group">
        <label class="form-label d-flex justify-content-between align-items-end">
            <div><?php echo lang("auth_password") ?></div>
            <a href="javascript:void(0)" class="d-block small"><?php echo lang("auth_forgout_pass") ?></a>
        </label>
        <input id="password" name="password" type="password" class="form-control">
        <label id="password-error" class="error" for="cCorreo" style="display: none; text-align: left; width: 100%;"></label>
    </div>
    <div class="d-flex justify-content-between align-items-center m-0">
        <label class="custom-control custom-checkbox m-0">
            <input type="checkbox" class="custom-control-input">
            <span class="custom-control-label"><?php echo lang("auth_remember_me") ?></span>
        </label>
        <button type="button" class="btn btn-primary" onclick="login.login();"><?php echo lang("auth_sign_in") ?></button>
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
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                    }
                },
                errorPlacement: function(error, element) {
                    var name = $(element).attr("name");
                    error.appendTo($("#" + name + "_validate"));
                }
            }
        });
    });
</script>