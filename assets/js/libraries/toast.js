var ClassToast = (function ($) {

    var _this = this;
    
    this.showMessages = function showMessages(type, messages) {
        for(var index in messages) {
            _this[type](messages[index]);
        }
    };

    this.success = function success(message) {
        this.showToast(base.MESSAGES_TYPE_SUCCESS, base.TEXT_TITLE_SUCCESS, message);
    };

    this.error = function error(message) {
        this.showToast(base.MESSAGES_TYPE_ERROR, base.TEXT_TITLE_ERROR, message);
    };

    this.warning = function warning(message) {
        this.showToast(base.MESSAGES_TYPE_WARNING, base.TEXT_TITLE_WARNING, message);
    };

    this.showToast = function showToast(type, title, msg) {
        toastr[type](msg, title, {
            positionClass: 'toast-top-right',
            closeButton: true,
            progressBar: true,
            preventDuplicates: true,
            newestOnTop: true,
            rtl: $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
        });
    }
});

var Toast = new ClassToast(jQuery);