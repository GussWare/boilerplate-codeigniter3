$(function () {
    
    class Register {

        constructor(){
            this.FORM_ID = "#form-register";
            this.FORM_OBJ = null;
            
            this.initForm();
        }

        initForm() {
            var self = this;
            var formOptions = optionsFormValidate.getOptions({
                rules: {
                    name: {
                        minlength:3,
                        maxlength:250,
                        required: true,
                    },
                    surname: {
                        minlength:3,
                        maxlength:250,
                        required: true,
                    },
                    username: {
                        minlength:3,
                        maxlength:250,
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    }
                }
            });

            // self.FORM_OBJ = $(self.FORM_ID).validate(formOptions);

            $(self.FORM_ID).ajaxForm({
                method: "POST",
                beforeSubmit: function () {
                    /*
                    var valid = self.FORM_OBJ.valid();
                    return valid;
                    */
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

    const register = new Register();
});