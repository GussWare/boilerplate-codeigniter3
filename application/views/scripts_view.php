<?php echo script_tag("assets/vendor/libs/popper/popper.js");  ?>
<?php echo script_tag("assets/vendor/js/bootstrap.js");  ?>
<?php echo script_tag("assets/vendor/js/sidenav.js");  ?>
<?php echo script_tag("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js");  ?>
<?php echo script_tag("assets/js/template/demo.js");  ?>
<?php echo script_tag("assets/js/base.js");  ?>

<script type="text/javascript">
    base.BASE_URL = "<?php echo base_url(); ?>";
    base.CONTROLLER = "<?php echo $this->uri->segment(2); ?>";
    base.ACTION = "<?php echo $this->uri->segment(3); ?>";
    base.ACTION_DEFAULT = "<?php echo ACTION_DEFAULT; ?>";
    base.ACTION_CREATE = "<?php echo ACTION_CREATE; ?>";
    base.ACTION_UPDATE = "<?php echo ACTION_UPDATE; ?>";
    base.ACTION_REMOVE = "<?php echo ACTION_REMOVE; ?>";

    base.MESES = <?php echo lang("general_mounths") ?>;
    base.DIAS = <?php echo lang("general_days") ?>;

    base.VALIDADOR_TEXT_REQUIRED = "<?php echo lang("validate_required"); ?>";
    base.VALIDADOR_TEXT_REMOTE = "<?php echo lang("validate_remote"); ?>";
    base.VALIDADOR_TEXT_EMAIL = "<?php echo lang("validate_email"); ?>";
    base.VALIDADOR_TEXT_URL = "<?php echo lang("validate_url"); ?>";
    base.VALIDADOR_TEXT_DATE = "<?php echo lang("validate_date"); ?>";
    base.VALIDADOR_TEXT_DATE_ISO = "<?php echo lang("validate_dateISO"); ?>";
    base.VALIDADOR_TEXT_NUMBER = "<?php echo lang("validate_number"); ?>";
    base.VALIDADOR_TEXT_DIGITS = "<?php echo lang("validate_digits"); ?>";
    base.VALIDADOR_TEXT_CREDIT_CARD = "<?php echo lang("validate_creditcard"); ?>";
    base.VALIDADOR_TEXT_EQUAL_TO = "<?php echo lang("validate_equalTo"); ?>";
    base.VALIDADOR_TEXT_EXTENSION = "<?php echo lang("validate_extension"); ?>";
    base.VALIDADOR_TEXT_MINLENGTH = "<?php echo lang("validate_minlength"); ?>";
    base.VALIDADOR_TEXT_MAXLENGTH = "<?php echo lang("validate_maxlength"); ?>";
    base.VALIDADOR_TEXT_RANGELENGTH = "<?php echo lang("validate_rangelength"); ?>";
    base.VALIDADOR_TEXT_RANGE = "<?php echo lang("validate_range"); ?>";
    base.VALIDADOR_TEXT_MIN = "<?php echo lang("validate_min"); ?>";
    base.VALIDADOR_TEXT_MAX = "<?php echo lang("validate_max"); ?>";
    base.VALIDADOR_TEXT_NIF_ES = "<?php echo lang("validate_nifES"); ?>";
    base.VALIDADOR_TEXT_NIE_ES = "<?php echo lang("validate_nieES"); ?>";
    base.VALIDADOR_TEXT_CIF_ES = "<?php echo lang("validate_cifES"); ?>";

    base.VALIDADOR_TEXT_CURP = "<?php echo lang("validate_curp"); ?>";
    base.VALIDADOR_TEXT_LETTERS_ONLY = "<?php echo lang("validate_lettersonly"); ?>";
    base.VALIDADOR_TEXT_LETTERS_LOWEERCASE_ONLY = "<?php echo lang("validate_lettersonly"); ?>";
    base.VALIDADOR_TEXT_LETTERS_UNDERSCORE = "<?php echo lang("validate_lettersunderscore"); ?>";
    base.VALIDADOR_TEXT_IS_NATURAL_NO_CERO = "<?php echo lang("validate_is_natural_no_cero"); ?>";
    base.VALIDADOR_TEXT_INTEGER = "<?php echo lang("validate_integer"); ?>";
    base.VALIDADOR_TEXT_IS_NATURAL = "<?php echo lang("validate_is_natural"); ?>";

    base.VALIDADOR_TEXT_RFC = "<?php echo lang("validate_rfc_moral"); ?>";
    base.VALIDADOR_TEXT_GREATER_THAN = "<?php echo lang("validate_greater_than"); ?>";
    base.VALIDADOR_TEXT_LESS_THAN = "<?php echo lang("validate_less_than"); ?>";
    base.VALIDADOR_TEXT_ALPHANUMERIC = "<?php echo lang("validate_alphanumeric"); ?>";

    base.VALIDADOR_NUMBER_SIN_GUION = "<?php echo lang("validate_number_sin_guion"); ?>";
    base.VALIDADOR_TEXT_DATE_MENOR_A = "<?php echo lang("validate_date_menor_a"); ?>";
    base.VALIDADOR_NUMBER_SIN_GUION_NO_ZERO = "<?php echo lang("validate_number_sin_guion_no_zero"); ?>";

    base.NUMBER_FORMAT = <?php echo NUMBER_FORMAT; ?>;
    base.BUSQUEDA_AVANZADA = "<?php echo BUSQUEDA_AVANZADA; ?>";
</script>