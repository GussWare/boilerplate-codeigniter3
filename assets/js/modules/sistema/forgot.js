var ForGotClass = (function ($) {

    var _this = this;
    var FORM = '#form-forgot';

    this.initForm = function initForm(params) {
        $(FORM).validate(params.form);
    };

    this.forgotPassword = function forgotPassword(e) {
        e.preventDefault();

        var url = $(FORM).attr("action");
        var validate = $(FORM).valid();

        if (!validate) {
            return false;
        }

        var data = $(FORM).serialize();

        base.ajax(url, data, _this.successForm, _this.errorForm);
    };

    this.successForm = function successForm(response) {
        base.irLogin();
    };

    this.errorForm = function errorForm(xhr, status, error) {
        var errors = (base.isValidJSON(xhr.responseText)) ? JSON.parse(xhr.responseText)["messages"] : [base.TEXT_ERROR_GENERIC];

        Alerts.showMessages(base.MESSAGES_TYPE_ERROR, errors);
    };
});

var forgot = new ForGotClass(jQuery);