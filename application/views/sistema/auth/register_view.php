<form id="form-register" class="my-5" action="<?php echo base_url("auth/register"); ?>" method="POST">
    <div id="alert-messages"></div>

    <div class="form-group">
        <label class="form-label"><?php echo lang("users_name") ?></label>
        <input id="name" name="name" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label"><?php echo lang("users_surname") ?></label>
        <input id="surname" name="surname" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label"><?php echo lang("users_username") ?></label>
        <input id="username" name="username" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label"><?php echo lang("users_email") ?></label>
        <input id="email" name="email" type="email" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label"><?php echo lang("users_password") ?></label>
        <input id="password" name="password" type="password" class="form-control">
    </div>

    <div class="d-flex justify-content-between align-items-center m-0">
        <label class="custom-control custom-checkbox m-0">
        </label>
        <button type="submit" class="btn btn-primary"><?php echo lang("auth_sign_in") ?></button>
    </div>
</form>

<!-- Core scripts -->
<?php $this->load->view("scripts_view");  ?>

<?php echo script_tag('assets/vendor/libs/validate/validate.js'); ?>
<?php echo script_tag('assets/js/plugins/ajaxForm/jquery.ajaxForm.js'); ?>
<?php echo script_tag('assets/js/modules/sistema/register.js'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        register.initForm({
            form: {
                ignore: '.ignore, .select2-input',
                focusInvalid: false,
                rules: {
                    name: {
                        required: true,
                    },
                    surname: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
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


        $("#form-register").submit(register.register);
    });
</script>