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

    this.ajax = function ajax(url, data, fnSuccess, fnError, method = "POST", dataType = "json") {

        var err = (typeof fnError === "function") ? fnError : function(err) {
            alert("Entro en Error :v");
        };

        var params = {
            url: url,
            method: method,
            dataType: dataType,
            success: fnSuccess,
            error: err,
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

var BaseUtils = new ClassBaseUtils(jQuery);