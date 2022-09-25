var LoginClass = (function ($) {

    var _this = this;
    var FORM = '#form-login';

    this.initForm = function initForm(params) {
        $(FORM).validate(params.form);
    }

    this.login = function login(e) {
        e.preventDefault();

        var url = $(FORM).attr("action");
        var validate = $(FORM).valid();

        if (!validate) {
            return false;
        }

        var data = $(FORM).serialize();

        base.ajax(url, data, _this.successForm, _this.errorForm);
    }

    this.successForm = function successForm(response) {
        base.irDashboard();
    }

    this.errorForm = function errorForm(xhr, status, error) {
        var messages = [];

        try {
            var response = JSON.parse(xhr.responseText);
            messages = response["messages"];
        } catch (error) {
            messages = [base.TEXT_ERROR_GENERIC];
        }

        SweetAlert.showMessages(base.MESSAGES_TYPE_ERROR, messages);
    }
});

var login = new LoginClass(jQuery);