var ClassBaseCrud = (function($) {

    this.save = function save(url, data) {
        this._self.ajax(url, data, this._self.saveSuccess, this._self.saveError);
    };

    this.saveSuccess = function saveSuccess() {

    };

    this.saveError = function saveError() {

    };

    this.enabled = function enabled(url, id) {
        this._self.ajax(url, { id: id }, this._self.enabledSuccess, this._self.enabledError);
    };

    this.enabledSuccess = function enabledSuccess() {

    };

    this.enabledError = function enabledError() {

    };

    this.disabled = function disabled(url, id) {
        this._self.ajax(url, { id: id }, this._self.disabledSuccess, this._self.disabledError);
    };

    this.disabledSuccess = function disabledSuccess() {

    };

    this.disabledError = function disabledError() {

    };
});

var baseCrud = new ClassBaseCrud(jQuery);