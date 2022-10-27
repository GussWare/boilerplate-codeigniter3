var Class_CoreUI_Buttons = (function(){
    var _this = this;
    
    this.BtnEdit = function btnEdit(id) {
        var html = _this.make(id, 'edit');

        return html;
    };
    
    this.BtnDelete = function btnDelete(id) {
        var html = _this.make(id,'trash');

        return html;
    };

    this.make = function make(id , type) {
        var html = `
            <a data-id="`+id+`" class="btn-act-`+type+`">
                <div id="icon-fas-`+type+`" data-title=".fas.fa-`+type+`" class="card icon-example justify-content-center align-items-center my-2 mx-2 d-inline-flex">
                    <i class="fas fa-`+type+` d-block"></i>
                </div>
            </a>
        `;

        return $(html);
    };
})


var CoreUI_Buttons = new Class_CoreUI_Buttons(jQuery);