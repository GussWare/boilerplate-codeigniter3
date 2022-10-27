var RegisterClass = (function ($) {

    var _this = this;
    var FORM = '#form-register';

    this.initForm = function initForm(params) {
        $(FORM).validate(params.form);
    }

    this.register = function register(e) {
        e.preventDefault();

        var url = $(FORM).attr("action");
        var validate = $(FORM).valid();

        if (!validate) {
            return false;
        }

        var data = $(FORM).serialize();

        Base.ajax(url, data, _this.successForm, _this.errorForm);
    }

    this.successForm = function successForm(response) {
        Alerts.clearMessages();
        
        Base.irLogin();
    }

    this.errorForm = function errorForm(xhr, status, error) {
        var errors = (Base.isValidJSON(xhr.responseText)) ? JSON.parse(xhr.responseText)["messages"] : [Base.TEXT_ERROR_GENERIC];

        Alerts.showMessages(Base.MESSAGES_TYPE_ERROR, errors);
    }
});

var register = new RegisterClass(jQuery);