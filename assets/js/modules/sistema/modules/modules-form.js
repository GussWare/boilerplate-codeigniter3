var ClassModulesForm = (function($, Actions_Form){
    var _this = this;

    this.init = function init(params) {

        _this.observer();
    };

    this.observer = function observer() {

        $("#btn-add-actions").click(function(e){
            e.preventDefault();

            Actions_Form.showForm();
        });
    };
});

var Modules_Form = new ClassModulesForm(jQuery, Actions_Form);