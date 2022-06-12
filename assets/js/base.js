var BaseClass = (function ($) {
    var _this = this;

    var BASE_URL = "";
    var CONTROLLER = "";
    var ACTION = "";
    var ACTION_DEFAULT = "";
    var ACTION_CREATE = "";
    var ACTION_UPDATE = "";
    var ACTION_REMOVE = "";

    var MESES = [];
    var DIAS = [];

    var VALIDADOR_TEXT_REQUIRED = "";
    var VALIDADOR_TEXT_REMOTE = "";
    var VALIDADOR_TEXT_EMAIL = "";
    var VALIDADOR_TEXT_URL = "";
    var VALIDADOR_TEXT_DATE = "";
    var VALIDADOR_TEXT_DATE_ISO = "";
    var VALIDADOR_TEXT_NUMBER = "";
    var VALIDADOR_TEXT_DIGITS = "";
    var VALIDADOR_TEXT_CREDIT_CARD = "";
    var VALIDADOR_TEXT_EQUAL_TO = "";
    var VALIDADOR_TEXT_EXTENSION = "";
    var VALIDADOR_TEXT_MINLENGTH = "";
    var VALIDADOR_TEXT_MAXLENGTH = "";
    var VALIDADOR_TEXT_RANGELENGTH = "";
    var VALIDADOR_TEXT_RANGE = "";
    var VALIDADOR_TEXT_MIN = "";
    var VALIDADOR_TEXT_MAX = "";
    var VALIDADOR_TEXT_NIF_ES = "";
    var VALIDADOR_TEXT_NIE_ES = "";
    var VALIDADOR_TEXT_CIF_ES = "";
    var VALIDADOR_TEXT_LETTERS_ONLY = "";
    var VALIDADOR_TEXT_LETTERS_UNDERSCORE = "";
    var VALIDADOR_TEXT_IS_NATURAL_NO_CERO = "";
    var VALIDADOR_TEXT_IS_NATURAL = "";
    var VALIDADOR_TEXT_INTEGER = "";
    var VALIDADOR_TEXT_GREATER_THAN = "";
    var VALIDADOR_TEXT_LESS_THAN = "";
    var VALIDADOR_TEXT_ALPHANUMERIC = "";

    var VALIDADOR_NUMBER_SIN_GUION = "";
    var NUMBER_FORMAT = "";

    var BUSQUEDA_AVANZADA = "";



    this.irIniciarSesion = function irIniciarSesion() {
        window.location.href = _this.BASE_URL + 'sistema/auth/login/index';
    };

    this.btnCreate = function btnCreate(idPadre) {
        var url = _this.BASE_URL + _this.CONTROLLER + '/form'
        if (typeof idPadre != "undefined" && idPadre > 0) {
            url += "/" + idPadre;
        }
        window.location.href = url;
    };

    this.btnIndex = function btnIndex(idPadre) {
        var url = _this.BASE_URL + _this.CONTROLLER + '/index'
        if (typeof idPadre != "undefined" && idPadre > 0) {
            url += "/" + idPadre;
        }
        window.location.href = url
    };

    this.btnCancel = function btnCancel(idPadre) {
        this.btnIndex(idPadre);
    };

    this.btnAdvancedSearch = function btnAdvancedSearch() {
        this.muestraOculta(_this.BUSQUEDA_AVANZADA);
    };

    this.btnDashboard = function btnDashboard() {
        window.location.href = _this.BASE_URL + "dashboard/index";
    };

    this.btnCancelSearch = function btnCancelSearch() {
        $("#form-" + _this.CONTROLLER + "-" + _this.BUSQUEDA_AVANZADA).resetForm();
        this.btnSearch();
    };

    this.btnSave = function btnSave(idPadre) {
        var valid = $("#form-" + _this.CONTROLLER).valid();
        if (valid) {
            if (typeof idPadre != "undefined") {
                _idPadre = idPadre;
            }
            var id = $("#form-" + _this.CONTROLLER).find("#id").val();
            var url = (id != "") ? _this.BASE_URL + _this.CONTROLLER + "/"  : _this.BASE_URL + _this.CONTROLLER + "/insertar";
            var params = {
                dataType: "json",
                resetForm: false,
                url: url,
                success: _this.btnSaveSuccess
            };
            $("#form-" + _this.CONTROLLER).ajaxForm(params);
            $("#form-" + _this.CONTROLLER).submit();
        } else {
            this.mostrarMenajeErrorFormulario();
        }
    };

    this.btnSaveForm = function btnSaveForm() {
        var valid = $("#form-" + _this.CONTROLLER).valid();

        if (valid) {
            var urlCreate = _this.BASE_URL + _this.CONTROLLER + "/" + _this.ACTION_CREATE;
            var urlUpdate = _this.BASE_URL + _this.CONTROLLER + "/" + _this.ACTION_UPDATE;

            var id = $("#form-" + _this.CONTROLLER).find("#id").val();
            var url = (!id) ? urlCreate : urlUpdate ;

            var params = {
                dataType: "json",
                resetForm: false,
                url: url,
                success: _this.formSuccess
            };

            $("#form-" + _this.CONTROLLER).ajaxForm(params);
            $("#form-" + _this.CONTROLLER).submit();
        }
    };

    this.formSuccess = function formSuccess(response, status, xhr, form) {
        if (response.success) {
            _this.btnListado(_idPadre);
        }

        if (response.failure) {
            _this.mostrarMensajesJSON(response.data.messages);
        }

        if (response.noLogin) {
            window.location.href = _this.BASE_URL + 'dashboard/index';
        }
    };

    this.btnSaveFormSuccess = function btnSaveFormSuccess(response, status, xhr, form) {
        _this.mostrarMensajesJSON(response.data.messages);
    };

    this.btnCmd = function btnCmd(id, url) {
        if (id == "" || url == "") {
            return;
        }
        $.ajax({
            data: { id: id },
            url: url,
            type: "POST",
            async: false,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    oTable.fnDraw();
                    _this.mostrarMensajesJSON(response.data.messages);
                }

                if (response.failure) {
                    _this.mostrarMensajesJSON(response.data.messages);
                }

                if (response.noLogin) {
                    window.location.href = _this.BASE_URL + 'dashboard/index';
                }
            },
            error: function () {
                _this.mostrarErrorConexionServidor();
            }
        });
    };

    /////////////////////////////////////////////// funciones generales ////////////////////////////////////////////////////////

    this.muestraOculta = function muestraOculta(id) {
        $("#" + id).slideToggle('slow');
    };

    this.logout = function logout() {
        this.confirmarGeneral(this.TEXT_CERRAR_SESION, function () {
            var url = _this.BASE_URL + 'acceso/cerrarSesion';
            window.location.href = url;
        });
    };

    this.btnEliminar = function btnEliminar(id, cNombre) {
        CoreUI.mensajeMsgBoxConfirm(CoreUtil.str.sprintf(_this.TEXT_MENSAJE_ELIMINAR, [cNombre]), function () {
            _this.btnCmd(id, _this.BASE_URL + _this.CONTROLLER + "/" + _this.ACTION_REMOVE);
        });
    };

    this.mostrarMensajesJSON = function mostrarMensajesJSON(message) {
        if (typeof message != "undefined") {
            CoreUI.addMessageJson(message);
        }
    };

    this.mostrarMenajeErrorFormulario = function mostrarMenajeErrorFormulario() {
        CoreUI.mensajeMsgBox(_this.TXT_MENSAHE_ERROR_FORMULARIO, this.TIPO_MENSAJE_ERROR);
    };

    this.mostrarErrorConexionServidor = function mostrarErrorConexionServidor() {
        CoreUI.mensajeMsgBox(_this.TEXT_MENSAJE_ERROR_CONEXION_SERVIDOR, this.TIPO_MENSAJE_ERROR);
    };

    this.numberFormat = function (input, redondear) {

        if (typeof redondear == "undefined") {
            redondear = 4;
        }

        var value = $(input).val();
        
        if (value > 0) {
            $(input).val(CoreUtil.format.formatNumber(value, "", redondear));
        } else {
            $(input).val(CoreUtil.format.formatNumber(0, "", redondear));
        }

    };

});

var base = new BaseClass(jQuery);