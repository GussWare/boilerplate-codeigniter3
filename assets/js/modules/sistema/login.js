var LoginClass = (function($) {

    var _self = this;
    var FORM = '#form_login';

    this.initForm = function initForm(params) {
        $(FORM).validate(params.form);
    }

    this.login = function login() {
        var validate = $(FORM).valid();
        if (validate) {
            var params = {
                dataType: "json",
                resetForm: true,
                success: _self.successForm,
                error: _self.errorForm
            };
            $(FORM).ajaxForm(params);
            $(FORM).submit();
        }
    }

    this.successForm = function successForm(response, status, xhr, form) {
        console.log(response);
        console.log(status);
        console.log(xhr);
        console.log(form);
    }

    this.errorForm = function errorForm(response, status, xhr, form) {
        console.log(response);
        console.log(status);
        console.log(xhr);
        console.log(form);
    }
});

LoginClass.prototype = base;

var login = new LoginClass(jQuery);