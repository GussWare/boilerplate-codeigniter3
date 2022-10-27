var ClassActionsForm = (function($){

    var _this = this;

    this.showForm = function showForm(id) {
        $('#form-actions').trigger("reset");
        $("#modal-form-actions").modal('show');
    };

});

var Actions_Form = new ClassActionsForm(jQuery);