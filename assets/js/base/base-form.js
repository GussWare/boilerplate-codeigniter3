var ClassBaseForm = (function($){

    var _FORM = '';

    this.initForm = function initForm(params) {
        _FORM = params.form;

        $(params.form).validate(params.validation);
    };

    this.save = function () {
        
    };

});

var BaseForm = new ClassBaseForm(jQuery);