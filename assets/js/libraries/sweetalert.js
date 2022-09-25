var ClassSweetAlert = (function($){

    var _this = this;
    
    this.success = function success(message) {
        this.showMessage(base.MESSAGES_TYPE_SUCCESS, base.TEXT_TITLE_SUCCESS, message);
    };
    
    this.error = function error(message) {
        this.showMessage(base.MESSAGES_TYPE_ERROR, base.TEXT_TITLE_ERROR, message);
    };
    
    this.warning = function warning(message) {
        this.showMessage(base.MESSAGES_TYPE_WARNING, base.TEXT_TITLE_WARNING, message);
    };
    
    this.showMessages = function showMessages(type, messages) {
        for (var index in messages) {
            _this[type](messages[index]);
        }
    };

    this.showMessage = function showMessage(type, title, msg) {
        Swal.fire({
            title: title,
            text: msg,
            icon: type,
            showCancelButton: true,
            customClass: {
                confirmButton: 'btn btn-danger btn-lg',
                cancelButton: 'btn btn-default btn-lg'
            }
        });
    }
});

var SweetAlert = new ClassSweetAlert(jQuery);