var ClassCoreUI_FormValidate = (function(){
    var _this = this;
    
    this.validationErrorPlacement = function validationErrorPlacement(error, element) {
        var $parent = $(element).parents('.form-group');

        // Do not duplicate errors
        if ($parent.find('.jquery-validation-error').length) {
            return;
        }

        $parent.append(
            error.addClass('jquery-validation-error small form-text invalid-feedback')
        );
    };

    this.validationHighlight = function validationHighlight(element) {
        var $el = $(element);
        var $parent = $el.parents('.form-group');

        $el.addClass('is-invalid');

        // Select2 and Tagsinput
        if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
            $el.parent().addClass('is-invalid');
        }
    };

    this.validationUnhighlight = function validationUnhighlight(element) {
        $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
    };
})

var CoreUI_FormValidate = new ClassCoreUI_FormValidate(jQuery);