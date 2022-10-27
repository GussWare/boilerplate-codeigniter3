var Class_CoreUI_Switcher = (function(){
    var _this = this;

    this.Success = function Success(id, name, label, checked, disabled) {
      return _this.Switcher(id, name, 'success',  label, checked, disabled);
    };

    this.Switcher = function Switcher(id, name, type, label, checked, disabled) {
        var switcher = _this.make(id, name, type, label, checked, disabled);

        return switcher;
    };

    this.make = function make(id, name, type, label, checked, disabled) {
        var html = `
        <label class="switcher switcher-`+type+`">
        <input type="checkbox" id="switcher-`+name+`" name="switcher-`+name+`" class="switcher-input"  ` + ((checked == 1) ? `checked` : ``) + `>
        <span data-item="`+id+`" class="switcher-indicator">
          <span data-check="enabled" data-item="`+id+`" class="switcher-yes">
            <span class="ion ion-md-checkmark"></span>
          </span>
          <span data-check="disabled" data-item="`+id+`" class="switcher-no">
            <span class="ion ion-md-close"></span>
          </span>
        </span>
        <span class="switcher-label">`+label+`</span>
      </label>
        `;

        return $(html);
    }
})

var CoreUI_Switcher = new Class_CoreUI_Switcher(jQuery);