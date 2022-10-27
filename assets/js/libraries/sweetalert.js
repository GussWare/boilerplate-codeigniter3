var ClassSweetAlert = (function($){

    var _this = this;
    
    this.success = function success(message) {
        this.showMessage(Base.MESSAGES_TYPE_SUCCESS, Base.TEXT_TITLE_SUCCESS, message);
    };
    
    this.error = function error(message) {
        this.showMessage(Base.MESSAGES_TYPE_ERROR, Base.TEXT_TITLE_ERROR, message);
    };
    
    this.warning = function warning(message) {
        this.showMessage(Base.MESSAGES_TYPE_WARNING, Base.TEXT_TITLE_WARNING, message);
    };
    
    this.showMessages = function showMessages(type, messages) {
        for (var index in messages) {
            _this[type](messages[index]);
        }
    };

    this.confirm = function confirm(title, message, fnConfirmOk, fnConfirmCancel){
        var params = {
            fnConfirmOk: fnConfirmOk,
            fnConfirmCancel: fnConfirmCancel
        };

        this.showMessage(Base.MESSAGES_TYPE_WARNING, title, message, params);
    };

    this.showMessage = function showMessage(type, title, msg, params) {

        var options = {
            title: title,
            text: msg,
            icon: type,
            allowOutsideClick:true,
            showCancelButton: true,
            customClass: {
                confirmButton: 'btn btn-danger btn-lg',
                cancelButton: 'btn btn-default btn-lg'
            }
        }

        Swal.fire(options).then(function(res){
            if(res.value) {
                if(typeof params.fnConfirmOk === "function") {
                    params.fnConfirmOk();
                }
            } else {
                if(typeof params.fnConfirmCancel === "function") {
                    params.fnConfirmCancel();
                }
            }
        });
    }
});

var SweetAlert = new ClassSweetAlert(jQuery);