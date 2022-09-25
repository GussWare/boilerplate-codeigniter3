<?php echo script_tag("assets/vendor/libs/popper/popper.js");  ?>
<?php echo script_tag("assets/vendor/js/bootstrap.js");  ?>
<?php echo script_tag("assets/vendor/js/sidenav.js");  ?>
<?php echo script_tag("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js");  ?>
<?php echo script_tag("assets/vendor/libs/toastr/toastr.js"); ?>
<?php echo script_tag("assets/vendor/libs/sweetalert2/sweetalert2.js"); ?>
<?php echo script_tag("node_modules/paginationjs/dist/pagination.js"); ?>

<?php echo script_tag("assets/js/template/demo.js");  ?>
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
    baseConstants.BASE_URL = "<?php echo base_url(); ?>";
    baseConstants.CONTROLLER = "<?php echo $this->uri->segment(2); ?>";
    baseConstants.ACTION = "<?php echo $this->uri->segment(3); ?>";
    baseConstants.ACTION_DEFAULT = "<?php echo ACTION_DEFAULT; ?>";
    baseConstants.ACTION_CREATE = "<?php echo ACTION_CREATE; ?>";
    baseConstants.ACTION_UPDATE = "<?php echo ACTION_UPDATE; ?>";
    baseConstants.ACTION_REMOVE = "<?php echo ACTION_REMOVE; ?>";

    baseConstants.MESES = <?php echo lang("general_mounths") ?>;
    baseConstants.DIAS = <?php echo lang("general_days") ?>;

    baseConstants.VALIDADOR_TEXT_REQUIRED = "<?php echo lang("validate_required"); ?>";
    baseConstants.VALIDADOR_TEXT_REMOTE = "<?php echo lang("validate_remote"); ?>";
    baseConstants.VALIDADOR_TEXT_EMAIL = "<?php echo lang("validate_email"); ?>";
    baseConstants.VALIDADOR_TEXT_URL = "<?php echo lang("validate_url"); ?>";
    baseConstants.VALIDADOR_TEXT_DATE = "<?php echo lang("validate_date"); ?>";
    baseConstants.VALIDADOR_TEXT_DATE_ISO = "<?php echo lang("validate_dateISO"); ?>";
    baseConstants.VALIDADOR_TEXT_NUMBER = "<?php echo lang("validate_number"); ?>";
    baseConstants.VALIDADOR_TEXT_DIGITS = "<?php echo lang("validate_digits"); ?>";
    baseConstants.VALIDADOR_TEXT_CREDIT_CARD = "<?php echo lang("validate_creditcard"); ?>";
    baseConstants.VALIDADOR_TEXT_EQUAL_TO = "<?php echo lang("validate_equalTo"); ?>";
    baseConstants.VALIDADOR_TEXT_EXTENSION = "<?php echo lang("validate_extension"); ?>";
    baseConstants.VALIDADOR_TEXT_MINLENGTH = "<?php echo lang("validate_minlength"); ?>";
    baseConstants.VALIDADOR_TEXT_MAXLENGTH = "<?php echo lang("validate_maxlength"); ?>";
    baseConstants.VALIDADOR_TEXT_RANGELENGTH = "<?php echo lang("validate_rangelength"); ?>";
    baseConstants.VALIDADOR_TEXT_RANGE = "<?php echo lang("validate_range"); ?>";
    baseConstants.VALIDADOR_TEXT_MIN = "<?php echo lang("validate_min"); ?>";
    baseConstants.VALIDADOR_TEXT_MAX = "<?php echo lang("validate_max"); ?>";
    baseConstants.VALIDADOR_TEXT_NIF_ES = "<?php echo lang("validate_nifES"); ?>";
    baseConstants.VALIDADOR_TEXT_NIE_ES = "<?php echo lang("validate_nieES"); ?>";
    baseConstants.VALIDADOR_TEXT_CIF_ES = "<?php echo lang("validate_cifES"); ?>";

    baseConstants.VALIDADOR_TEXT_CURP = "<?php echo lang("validate_curp"); ?>";
    baseConstants.VALIDADOR_TEXT_LETTERS_ONLY = "<?php echo lang("validate_lettersonly"); ?>";
    baseConstants.VALIDADOR_TEXT_LETTERS_LOWEERCASE_ONLY = "<?php echo lang("validate_lettersonly"); ?>";
    baseConstants.VALIDADOR_TEXT_LETTERS_UNDERSCORE = "<?php echo lang("validate_lettersunderscore"); ?>";
    baseConstants.VALIDADOR_TEXT_IS_NATURAL_NO_CERO = "<?php echo lang("validate_is_natural_no_cero"); ?>";
    baseConstants.VALIDADOR_TEXT_INTEGER = "<?php echo lang("validate_integer"); ?>";
    baseConstants.VALIDADOR_TEXT_IS_NATURAL = "<?php echo lang("validate_is_natural"); ?>";

    baseConstants.VALIDADOR_TEXT_RFC = "<?php echo lang("validate_rfc_moral"); ?>";
    baseConstants.VALIDADOR_TEXT_GREATER_THAN = "<?php echo lang("validate_greater_than"); ?>";
    baseConstants.VALIDADOR_TEXT_LESS_THAN = "<?php echo lang("validate_less_than"); ?>";
    baseConstants.VALIDADOR_TEXT_ALPHANUMERIC = "<?php echo lang("validate_alphanumeric"); ?>";

    baseConstants.VALIDADOR_NUMBER_SIN_GUION = "<?php echo lang("validate_number_sin_guion"); ?>";
    baseConstants.VALIDADOR_TEXT_DATE_MENOR_A = "<?php echo lang("validate_date_menor_a"); ?>";
    baseConstants.VALIDADOR_NUMBER_SIN_GUION_NO_ZERO = "<?php echo lang("validate_number_sin_guion_no_zero"); ?>";

    baseConstants.NUMBER_FORMAT = <?php echo NUMBER_FORMAT; ?>;
    baseConstants.BUSQUEDA_AVANZADA = "<?php echo BUSQUEDA_AVANZADA; ?>";

    baseConstants.TEXT_ERROR_GENERIC = "<?php echo lang("text_error_generic"); ?>";

    baseConstants.MESSAGES_PLUGIN_TOAST = "<?php echo MESSAGES_PLUGIN_TOAST; ?>";
    baseConstants.MESSAGES_TYPE_SUCCESS = "<?php echo MESSAGES_TYPE_SUCCESS; ?>";
    baseConstants.MESSAGES_TYPE_ERROR = "<?php echo MESSAGES_TYPE_ERROR; ?>";
    baseConstants.MESSAGES_TYPE_WARNING = "<?php echo MESSAGES_TYPE_WARNING; ?>";

    baseConstants.TEXT_TITLE_SUCCESS = "<?php echo TEXT_TITLE_SUCCESS; ?>";
    baseConstants.TEXT_TITLE_ERROR = "<?php echo TEXT_TITLE_ERROR; ?>";
    baseConstants.TEXT_TITLE_WARNING = "<?php echo TEXT_TITLE_WARNING; ?>";

    $(document).ready(function() {
        $.extend(base, baseConstants);
        $.extend(base, baseUtils);
        $.extend(base, baseCrud);
        $.extend(base, baseList);
        $.extend(base, baseForm);
        
        Messages.flashMessages(<?php echo ($this->session->flashdata('_MESSAGES') ? $this->session->flashdata('_MESSAGES') : '{}') ?>);
    });
</script>