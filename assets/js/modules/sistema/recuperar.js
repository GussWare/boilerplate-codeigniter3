var ClassRecuperar = (function($) {

    var _self = this;
    var FORM = '#form-recuperar';

    this.initForm = function initForm(params) {
        console.table(params);
        $(FORM).validate(params.form);
    }

    this.recuperar = function recuperar() {
        var validate = $(FORM).valid();
        if (validate) {
            var params = {
                dataType: "json",
                resetForm: true,
                success: _self.recuperarSuccess,
                error: _self.recuperarError
            };
            $(FORM).ajaxForm(params);
            $(FORM).submit();
        }
    }

    this.recuperarSuccess = function recuperarSuccess(response, status, xhr, form) {
        console.log(response);
        console.log(status);
        console.log(xhr);
        console.log(form);
    }

    this.recuperarError = function recuperarError(response, status, xhr, form) {
        console.log(response);
        console.log(status);
        console.log(xhr);
        console.log(form);
    }
});

ClassRecuperar.prototype = base;

var recuperar = new ClassRecuperar(jQuery);