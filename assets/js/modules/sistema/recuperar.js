class Recuperar {

    constructor() {
        this.FORM_ID = "#form-forgot";
        this.FORM_OBJ = null;

        this.initForm();
    }

    initForm() {
        var self = this;
        var formOptions = optionsFormValidate.getOptions({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            }
        });

        self.FORM_OBJ = $(self.FORM_ID).validate(formOptions);

        $(self.FORM_ID).ajaxForm({
            method: "POST",
            beforeSubmit: function () {
                var valid = self.FORM_OBJ.valid();
                return valid;
            },
            success: function (response) {
                utils.irLogin();
            },
            error: function (e) {
                var response = JSON.parse(e.responseText);
                $.BasicMessage.error([response.messages]);
            }
        });
    }
}

const recuperar = new Recuperar();