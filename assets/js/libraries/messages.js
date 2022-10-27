var ClassMessages = (function ($) {

    this.flashMessages = function flashMessages(flashMessage) {
        if (typeof flashMessage != "object") {
            return;
        }

        if (flashMessage.type === Base.MESSAGES_TYPE_SUCCESS) {
            Toast.showMessages(flashMessage.type, flashMessage.messages);
        } else {
            SweetAlert.showMessages(flashMessage.type, flashMessage.messages);
        }
    };

});

var Messages = new ClassMessages(jQuery);

