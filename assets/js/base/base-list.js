var ClassBaseList = (function ($) {

    this.initListado = function initListado(module) {
        TableRoles = $("#" + module + "-table").BasicTable({
            "pagesContainer": "." + module + "-pages-container",
            "template": CoreUI.BasicTable.template,
            "templateLoading": CoreUI.BasicTable.templateLoading,
            "templateRow": _this.templateRow,
            "serverSide": {
                "url": Base.BASE_URL + '' + module + '/pagination',
                "method": "GET",
                "advancedSearch": [
                    "#"+module+"-advanced-search",
                    "#"+module+"roles-frm-show",
                    "#"+module+"roles-frm-search"
                ],
                "timesleep": 1000
            },
        });

        _this.search();
    };

    this.templateRow = function templateRow(tr) {
        var data = tr.attr("data-item");
        data = $.parseJSON(data);

        var tdHabilitado = tr.find("td").eq(4);
        var tdActions = tr.find("td").eq(5);
        tdActions.html('');

        // boton habilitado
        var tdHabilitado = tr.find("td").eq(4);
        var switcher = CoreUI.Switcher.Success(data.id, "enabled-" + data.id, "", (data.enabled == 1));
        switcher.find("#switcher-enabled-" + data.id ).attr('onchange', 'roles.switcherChange(' + data.id + ')');
        tdHabilitado.html(switcher);

        // botones de acciones
        var btnEdit = CoreUI.Buttons.BtnEdit(data.id);
        btnEdit.attr('onclick', 'roles.editClick(' + data.id + ');')
        btnEdit.appendTo(tdActions);

        var btnDelete = CoreUI.Buttons.BtnDelete(data.id);
        btnDelete.attr('onclick', 'roles.deleteClick(' + data.id + ');')
        btnDelete.appendTo(tdActions);
    }

});


var baseList = new ClassBaseList(jQuery);