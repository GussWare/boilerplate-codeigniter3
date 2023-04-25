<?php echo script_tag("node_modules/underscore/underscore.js");  ?>

<?php echo script_tag("assets/vendor/libs/popper/popper.js");  ?>
<?php echo script_tag("assets/vendor/js/bootstrap.js");  ?>
<?php echo script_tag("assets/vendor/js/sidenav.js");  ?>
<?php echo script_tag("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js");  ?>
<?php echo script_tag("assets/vendor/libs/toastr/toastr.js"); ?>
<?php echo script_tag("assets/vendor/libs/sweetalert2/sweetalert2.js"); ?>

<?php echo script_tag("assets/js/template/demo.js");  ?>
<?php echo script_tag("assets/js/constants.js"); ?>
<?php echo script_tag("assets/js/utils.js"); ?>

<?php echo script_tag('assets/js/libraries/optionsFormValidate.js'); ?>
<?php echo script_tag('assets/vendor/libs/validate/validate.js'); ?>
<?php echo script_tag('node_modules/jquery-form/dist/jquery.form.min.js'); ?>
<?php echo script_tag('node_modules/plugin-basic-messages/src/jquery.basic_messages.js'); ?>

<?php echo script_tag("node_modules/handlebars/dist/handlebars.js"); ?>
<?php echo script_tag("node_modules/short-uuid/index.js"); ?>
<?php echo script_tag("node_modules/plugin-basic-pagination/src/jquery.BasicPagination.js"); ?>

<script type="text/javascript">
    constants.BASE_URL = "<?php echo base_url(); ?>";
    constants.CONTROLLER = "<?php echo $this->uri->segment(2); ?>";
    constants.ACTION = "<?php echo $this->uri->segment(3); ?>";
    constants.ACTION_DEFAULT = "<?php echo ACTION_DEFAULT; ?>";
    constants.ACTION_CREATE = "<?php echo ACTION_CREATE; ?>";
    constants.ACTION_UPDATE = "<?php echo ACTION_UPDATE; ?>";
    constants.ACTION_REMOVE = "<?php echo ACTION_REMOVE; ?>";

    constants.MESES = <?php echo lang("general_mounths") ?>;
    constants.DIAS = <?php echo lang("general_days") ?>;

    constants.VALIDADOR_TEXT_REQUIRED = "<?php echo lang("validate_required"); ?>";
    constants.VALIDADOR_TEXT_REMOTE = "<?php echo lang("validate_remote"); ?>";
    constants.VALIDADOR_TEXT_EMAIL = "<?php echo lang("validate_email"); ?>";
    constants.VALIDADOR_TEXT_URL = "<?php echo lang("validate_url"); ?>";
    constants.VALIDADOR_TEXT_DATE = "<?php echo lang("validate_date"); ?>";
    constants.VALIDADOR_TEXT_DATE_ISO = "<?php echo lang("validate_dateISO"); ?>";
    constants.VALIDADOR_TEXT_NUMBER = "<?php echo lang("validate_number"); ?>";
    constants.VALIDADOR_TEXT_DIGITS = "<?php echo lang("validate_digits"); ?>";
    constants.VALIDADOR_TEXT_CREDIT_CARD = "<?php echo lang("validate_creditcard"); ?>";
    constants.VALIDADOR_TEXT_EQUAL_TO = "<?php echo lang("validate_equalTo"); ?>";
    constants.VALIDADOR_TEXT_EXTENSION = "<?php echo lang("validate_extension"); ?>";
    constants.VALIDADOR_TEXT_MINLENGTH = "<?php echo lang("validate_minlength"); ?>";
    constants.VALIDADOR_TEXT_MAXLENGTH = "<?php echo lang("validate_maxlength"); ?>";
    constants.VALIDADOR_TEXT_RANGELENGTH = "<?php echo lang("validate_rangelength"); ?>";
    constants.VALIDADOR_TEXT_RANGE = "<?php echo lang("validate_range"); ?>";
    constants.VALIDADOR_TEXT_MIN = "<?php echo lang("validate_min"); ?>";
    constants.VALIDADOR_TEXT_MAX = "<?php echo lang("validate_max"); ?>";
    constants.VALIDADOR_TEXT_NIF_ES = "<?php echo lang("validate_nifES"); ?>";
    constants.VALIDADOR_TEXT_NIE_ES = "<?php echo lang("validate_nieES"); ?>";
    constants.VALIDADOR_TEXT_CIF_ES = "<?php echo lang("validate_cifES"); ?>";

    constants.VALIDADOR_TEXT_CURP = "<?php echo lang("validate_curp"); ?>";
    constants.VALIDADOR_TEXT_LETTERS_ONLY = "<?php echo lang("validate_lettersonly"); ?>";
    constants.VALIDADOR_TEXT_LETTERS_LOWEERCASE_ONLY = "<?php echo lang("validate_lettersonly"); ?>";
    constants.VALIDADOR_TEXT_LETTERS_UNDERSCORE = "<?php echo lang("validate_lettersunderscore"); ?>";
    constants.VALIDADOR_TEXT_IS_NATURAL_NO_CERO = "<?php echo lang("validate_is_natural_no_cero"); ?>";
    constants.VALIDADOR_TEXT_INTEGER = "<?php echo lang("validate_integer"); ?>";
    constants.VALIDADOR_TEXT_IS_NATURAL = "<?php echo lang("validate_is_natural"); ?>";

    constants.VALIDADOR_TEXT_RFC = "<?php echo lang("validate_rfc_moral"); ?>";
    constants.VALIDADOR_TEXT_GREATER_THAN = "<?php echo lang("validate_greater_than"); ?>";
    constants.VALIDADOR_TEXT_LESS_THAN = "<?php echo lang("validate_less_than"); ?>";
    constants.VALIDADOR_TEXT_ALPHANUMERIC = "<?php echo lang("validate_alphanumeric"); ?>";

    constants.VALIDADOR_NUMBER_SIN_GUION = "<?php echo lang("validate_number_sin_guion"); ?>";
    constants.VALIDADOR_TEXT_DATE_MENOR_A = "<?php echo lang("validate_date_menor_a"); ?>";
    constants.VALIDADOR_NUMBER_SIN_GUION_NO_ZERO = "<?php echo lang("validate_number_sin_guion_no_zero"); ?>";

    constants.NUMBER_FORMAT = <?php echo NUMBER_FORMAT; ?>;
    constants.BUSQUEDA_AVANZADA = "<?php echo BUSQUEDA_AVANZADA; ?>";

    constants.TEXT_ERROR_GENERIC = "<?php echo lang("text_error_generic"); ?>";

    
    constants.CODE_TYPE_SUCCESS = "<?php echo CODE_TYPE_SUCCESS; ?>";
    constants.CODE_TYPE_ERROR = "<?php echo CODE_TYPE_ERROR; ?>";
    constants.CODE_TYPE_WARNING = "<?php echo CODE_TYPE_WARNING; ?>";

    constants.TEXT_TITLE_SUCCESS = "<?php echo TEXT_TITLE_SUCCESS; ?>";
    constants.TEXT_TITLE_ERROR = "<?php echo TEXT_TITLE_ERROR; ?>";
    constants.TEXT_TITLE_WARNING = "<?php echo TEXT_TITLE_WARNING; ?>";


    constants.TEXT_DELETE_CONFIRM_TITLE = "<?php echo lang('general_text_delete_confirm_title'); ?>";
    constants.TEXT_DELETE_CONFIRM_QUESTION = "<?php echo lang('general_text_delete_confirm_question'); ?>";
    constants.TEXT_DELETE_ACTION_CONFIRM = "<?php echo lang('general_text_delete_action_confirm'); ?>";

    constants.TEXT_ENABLED_REGISTER = "<?php echo lang('general_text_enabled_register'); ?>";
    constants.TEXT_DISABLED_REGISTER = "<?php echo lang('general_text_disabled_register'); ?>";

    $(document).ready(function() {
        var flash = JSON.parse('<?php echo ($this->session->flashdata('_MESSAGES')) ? $this->session->flashdata('_MESSAGES') : '{"code":null, "messages":[]}' ?>');

        $.BasicMessage.init({
            success: {
                plugin: 'sweetalert',
                options: {
                    title: "¡ Exito !",
                    icon: 'success',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-info btn-lg',
                        cancelButton: 'btn btn-default btn-lg'
                    }
                }
            },
            info: {
                plugin: 'sweetalert',
                options: {
                    title: "¡ Mensaje de Información !",
                    icon: 'info',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-info btn-lg',
                        cancelButton: 'btn btn-default btn-lg'
                    }
                }
            },
            warning: {
                plugin: 'sweetalert',
                options: {
                    title: "! Tenga precaución !",
                    icon: 'warning',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-warning btn-lg',
                        cancelButton: 'btn btn-default btn-lg'
                    }
                }
            },
            error: {
                plugin: 'sweetalert',
                options: {
                    title: "¡ Sucedio un error !",
                    icon: 'error',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-danger btn-lg',
                        cancelButton: 'btn btn-default btn-lg'
                    }
                }
            }
        }).flash(flash.code, flash.messages);
    });
</script>