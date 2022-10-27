<?php echo script_tag("assets/vendor/libs/popper/popper.js");  ?>
<?php echo script_tag("assets/vendor/js/bootstrap.js");  ?>
<?php echo script_tag("assets/vendor/js/sidenav.js");  ?>
<?php echo script_tag("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js");  ?>
<?php echo script_tag("assets/vendor/libs/toastr/toastr.js"); ?>
<?php echo script_tag("assets/vendor/libs/sweetalert2/sweetalert2.js"); ?>

<?php echo script_tag("assets/js/template/demo.js");  ?>

<?php echo script_tag("assets/js/coreui/CoreUI_Switcher.js");  ?>
<?php echo script_tag("assets/js/coreui/CoreUI_Buttons.js");  ?>
<?php echo script_tag("assets/js/coreui/CoreUI_BasicTable.js");  ?>
<?php echo script_tag("assets/js/coreui/CoreUI_FormValidate.js");  ?>
<?php echo script_tag("assets/js/coreui.js");  ?>

<?php echo script_tag("assets/js/libraries/alerts.js");?>
<?php echo script_tag("assets/js/libraries/toast.js"); ?>
<?php echo script_tag("assets/js/libraries/sweetalert.js"); ?>
<?php echo script_tag("assets/js/libraries/messages.js"); ?>

<?php echo script_tag("assets/js/base/base-constants.js"); ?>
<?php echo script_tag("assets/js/base/base-utils.js"); ?>
<?php echo script_tag("assets/js/base/base-crud.js"); ?>
<?php echo script_tag("assets/js/base/base-list.js"); ?>
<?php echo script_tag("assets/js/base/base-form.js"); ?>
<?php echo script_tag("assets/js/base.js"); ?>

<script type="text/javascript">
    BaseConstants.BASE_URL = "<?php echo base_url(); ?>";
    BaseConstants.CONTROLLER = "<?php echo $this->uri->segment(2); ?>";
    BaseConstants.ACTION = "<?php echo $this->uri->segment(3); ?>";
    BaseConstants.ACTION_DEFAULT = "<?php echo ACTION_DEFAULT; ?>";
    BaseConstants.ACTION_CREATE = "<?php echo ACTION_CREATE; ?>";
    BaseConstants.ACTION_UPDATE = "<?php echo ACTION_UPDATE; ?>";
    BaseConstants.ACTION_REMOVE = "<?php echo ACTION_REMOVE; ?>";

    BaseConstants.MESES = <?php echo lang("general_mounths") ?>;
    BaseConstants.DIAS = <?php echo lang("general_days") ?>;

    BaseConstants.VALIDADOR_TEXT_REQUIRED = "<?php echo lang("validate_required"); ?>";
    BaseConstants.VALIDADOR_TEXT_REMOTE = "<?php echo lang("validate_remote"); ?>";
    BaseConstants.VALIDADOR_TEXT_EMAIL = "<?php echo lang("validate_email"); ?>";
    BaseConstants.VALIDADOR_TEXT_URL = "<?php echo lang("validate_url"); ?>";
    BaseConstants.VALIDADOR_TEXT_DATE = "<?php echo lang("validate_date"); ?>";
    BaseConstants.VALIDADOR_TEXT_DATE_ISO = "<?php echo lang("validate_dateISO"); ?>";
    BaseConstants.VALIDADOR_TEXT_NUMBER = "<?php echo lang("validate_number"); ?>";
    BaseConstants.VALIDADOR_TEXT_DIGITS = "<?php echo lang("validate_digits"); ?>";
    BaseConstants.VALIDADOR_TEXT_CREDIT_CARD = "<?php echo lang("validate_creditcard"); ?>";
    BaseConstants.VALIDADOR_TEXT_EQUAL_TO = "<?php echo lang("validate_equalTo"); ?>";
    BaseConstants.VALIDADOR_TEXT_EXTENSION = "<?php echo lang("validate_extension"); ?>";
    BaseConstants.VALIDADOR_TEXT_MINLENGTH = "<?php echo lang("validate_minlength"); ?>";
    BaseConstants.VALIDADOR_TEXT_MAXLENGTH = "<?php echo lang("validate_maxlength"); ?>";
    BaseConstants.VALIDADOR_TEXT_RANGELENGTH = "<?php echo lang("validate_rangelength"); ?>";
    BaseConstants.VALIDADOR_TEXT_RANGE = "<?php echo lang("validate_range"); ?>";
    BaseConstants.VALIDADOR_TEXT_MIN = "<?php echo lang("validate_min"); ?>";
    BaseConstants.VALIDADOR_TEXT_MAX = "<?php echo lang("validate_max"); ?>";
    BaseConstants.VALIDADOR_TEXT_NIF_ES = "<?php echo lang("validate_nifES"); ?>";
    BaseConstants.VALIDADOR_TEXT_NIE_ES = "<?php echo lang("validate_nieES"); ?>";
    BaseConstants.VALIDADOR_TEXT_CIF_ES = "<?php echo lang("validate_cifES"); ?>";

    BaseConstants.VALIDADOR_TEXT_CURP = "<?php echo lang("validate_curp"); ?>";
    BaseConstants.VALIDADOR_TEXT_LETTERS_ONLY = "<?php echo lang("validate_lettersonly"); ?>";
    BaseConstants.VALIDADOR_TEXT_LETTERS_LOWEERCASE_ONLY = "<?php echo lang("validate_lettersonly"); ?>";
    BaseConstants.VALIDADOR_TEXT_LETTERS_UNDERSCORE = "<?php echo lang("validate_lettersunderscore"); ?>";
    BaseConstants.VALIDADOR_TEXT_IS_NATURAL_NO_CERO = "<?php echo lang("validate_is_natural_no_cero"); ?>";
    BaseConstants.VALIDADOR_TEXT_INTEGER = "<?php echo lang("validate_integer"); ?>";
    BaseConstants.VALIDADOR_TEXT_IS_NATURAL = "<?php echo lang("validate_is_natural"); ?>";

    BaseConstants.VALIDADOR_TEXT_RFC = "<?php echo lang("validate_rfc_moral"); ?>";
    BaseConstants.VALIDADOR_TEXT_GREATER_THAN = "<?php echo lang("validate_greater_than"); ?>";
    BaseConstants.VALIDADOR_TEXT_LESS_THAN = "<?php echo lang("validate_less_than"); ?>";
    BaseConstants.VALIDADOR_TEXT_ALPHANUMERIC = "<?php echo lang("validate_alphanumeric"); ?>";

    BaseConstants.VALIDADOR_NUMBER_SIN_GUION = "<?php echo lang("validate_number_sin_guion"); ?>";
    BaseConstants.VALIDADOR_TEXT_DATE_MENOR_A = "<?php echo lang("validate_date_menor_a"); ?>";
    BaseConstants.VALIDADOR_NUMBER_SIN_GUION_NO_ZERO = "<?php echo lang("validate_number_sin_guion_no_zero"); ?>";

    BaseConstants.NUMBER_FORMAT = <?php echo NUMBER_FORMAT; ?>;
    BaseConstants.BUSQUEDA_AVANZADA = "<?php echo BUSQUEDA_AVANZADA; ?>";

    BaseConstants.TEXT_ERROR_GENERIC = "<?php echo lang("text_error_generic"); ?>";

    BaseConstants.MESSAGES_PLUGIN_TOAST = "<?php echo MESSAGES_PLUGIN_TOAST; ?>";
    BaseConstants.MESSAGES_TYPE_SUCCESS = "<?php echo MESSAGES_TYPE_SUCCESS; ?>";
    BaseConstants.MESSAGES_TYPE_ERROR = "<?php echo MESSAGES_TYPE_ERROR; ?>";
    BaseConstants.MESSAGES_TYPE_WARNING = "<?php echo MESSAGES_TYPE_WARNING; ?>";

    BaseConstants.TEXT_TITLE_SUCCESS = "<?php echo TEXT_TITLE_SUCCESS; ?>";
    BaseConstants.TEXT_TITLE_ERROR = "<?php echo TEXT_TITLE_ERROR; ?>";
    BaseConstants.TEXT_TITLE_WARNING = "<?php echo TEXT_TITLE_WARNING; ?>";


    BaseConstants.TEXT_DELETE_CONFIRM_TITLE = "<?php echo lang('general_text_delete_confirm_title'); ?>";
    BaseConstants.TEXT_DELETE_CONFIRM_QUESTION = "<?php echo lang('general_text_delete_confirm_question'); ?>";
    BaseConstants.TEXT_DELETE_ACTION_CONFIRM = "<?php echo lang('general_text_delete_action_confirm'); ?>";

    BaseConstants.TEXT_ENABLED_REGISTER = "<?php echo lang('general_text_enabled_register'); ?>";
    BaseConstants.TEXT_DISABLED_REGISTER = "<?php echo lang('general_text_disabled_register'); ?>";

    $(document).ready(function() {
        CoreUI.BasicTable = CoreUI_BasicTable;
        CoreUI.Buttons = CoreUI_Buttons;
        CoreUI.Switcher = CoreUI_Switcher;
        CoreUI.FormValidate = CoreUI_FormValidate;

        $.extend(Base, BaseConstants);
        $.extend(Base, BaseUtils);
        $.extend(Base, BaseForm);

        Base.CRUD = BaseCrud;
        
        Messages.flashMessages(<?php echo ($this->session->flashdata('_MESSAGES') ? $this->session->flashdata('_MESSAGES') : '{}') ?>);
    });
</script>