$(function () {
    
    class Login {

        constructor(){
            this.FORM_ID = "#form-login";
            this.FORM_OBJ = null;
            
            this.initForm();
        }

        initForm() {
            var self = this;
            var formOptions = optionsFormValidate.getOptions({
                rules: {
                    password: {
                        required: true,
                    },
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
                   utils.irDashboard();
                },
                error: function (e) {
                    var response = JSON.parse(e.responseText);
                    $.BasicMessage.error([response.messages]);
                }
            });
        }
    }

    const login = new Login();
});