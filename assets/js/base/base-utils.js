var ClassBaseUtils = (function($) {
    
    this.irLogin = function irLogin() {
        window.location.href = this._self.BASE_URL + 'auth/index';
    };

    this.irDashboard = function irDashboard() {
        window.location.href = this._self.BASE_URL + 'dashboard/index';
    }

    this.mostrarMensajesJSON = function mostrarMensajesJSON(message) {
        if (typeof message != "undefined") {
            CoreUI.addMessageJson(message);
        }
    };

    this.mostrarMenajeErrorFormulario = function mostrarMenajeErrorFormulario() {
        CoreUI.mensajeMsgBox(this._self.TEXT_MENSAJE_ERROR_FORMULARIO, this.TIPO_MENSAJE_ERROR);
    };

    this.mostrarErrorConexionServidor = function mostrarErrorConexionServidor() {
        CoreUI.mensajeMsgBox(this._self.TEXT_MENSAJE_ERROR_CONEXION_SERVIDOR, this.TIPO_MENSAJE_ERROR);
    };

    this.numberFormat = function (input, redondear = 2) {
        var value = $(input).val();

        $(input).val(CoreUtil.format.formatNumber((value > 0) ? value : 0, "", redondear));
    };

    this.ajax = function ajax(url, data, fnSuccess, fnError, method = "POST", dataType = "json") {

        var params = {
            url: url,
            method: method,
            dataType: dataType,
            success: fnSuccess,
            error: fnError,
            data: data
        };

        $.ajax(params);
    };

    this.isValidJSON = function isValidJSON(text) {

        var isValidJSON = true;
        try { JSON.parse(jsonString) } catch { isValidJSON = false }

        return isValidJSON;
    }
});

var baseUtils = new ClassBaseUtils(jQuery);