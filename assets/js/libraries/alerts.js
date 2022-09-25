var ClassAlerts = (function($) {

    var _this = this;

    this.HTML_UL = '';
    this.HTML_CONTENT = '';
    this.CONTENT_ALERTS_ERRORS = "#alert-messages";
    
    this.success = function success(messages) {
        _this.HTML_CONTENT = $('<div class="alert alert-success" role="alert"></div>');
        _this.HTML_UL = $("<ul></ul>");

        for (var index in messages) {
            _this.showMessage(messages[index]);
        }

        _this.HTML_CONTENT.append(_this.HTML_UL);
        
        $(_this.CONTENT_ALERTS_ERRORS).append(_this.HTML_CONTENT);
    };
    
    this.error = function error(messages) {
        _this.HTML_CONTENT = $('<div class="alert alert-danger" role="alert"></div>');
        _this.HTML_UL = $("<ul></ul>");
        
        for (var index in messages) {
            _this.showMessage(messages[index]);
        }

        _this.HTML_CONTENT.append(_this.HTML_UL);

        $(_this.CONTENT_ALERTS_ERRORS).append(_this.HTML_CONTENT);
    };
    
    this.warning = function warning(messages) {
        _this.HTML_CONTENT = $('<div class="alert alert-warning" role="alert"></div>');
        _this.HTML_UL = $("<ul></ul>");

        for(var index in messages) {
            _this.showMessage(messages[index]);
        }

        _this.HTML_CONTENT.append(_this.HTML_UL);

        $(_this.CONTENT_ALERTS_ERRORS).append(_this.HTML_CONTENT);
    };
    
    this.showMessages = function showMessages(type, messages) {
        _this.clearMessages();

        _this[type](messages);
    };

    this.showMessage = function showMessage(message) {
        var alert = ['<li>', message, '</li>'].join(' ');

        _this.HTML_UL.append(alert);
    };

    this.clearMessages = function clearMessages() {
        $(_this.CONTENT_ALERTS_ERRORS).html('');
    };
});

var Alerts = new ClassAlerts(jQuery);