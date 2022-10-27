var ClassModulesListado = (function ($, Base, CoreUI, Modules_Actions) {

    var _this = this;

    this.initListado = function initListado() {
        TableModules = $("#table-modules").BasicTable({
            "testing": true,
            "pagesContainer": ".modules-pages-container",
            "template": CoreUI.BasicTable.template,
            "templateLoading": CoreUI.BasicTable.templateLoading,
            "templateRow": _this.templateRow,
            "serverSide": {
                "url": Base.BASE_URL + 'modules/pagination',
                "method": "GET",
                "advancedSearch": [
                    "#modules-advanced-search",
                    "#modules-frm-show",
                    "#modules-frm-search"
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
        switcher.find("#switcher-enabled-" + data.id).attr('onchange', 'modules.switcherChange(' + data.id + ')');
        tdHabilitado.html(switcher);

        // botones de acciones
        var btnEdit = CoreUI.Buttons.BtnEdit(data.id);
        btnEdit.attr('onclick', 'modules.editClick(' + data.id + ');')
        btnEdit.appendTo(tdActions);

        var btnDelete = CoreUI.Buttons.BtnDelete(data.id);
        btnDelete.attr('onclick', 'modules.deleteClick(' + data.id + ');')
        btnDelete.appendTo(tdActions);
    };

    this.switcherChange = function switcherChange(id) {
        var checked = $(event.target).is(':checked');

        if (checked) {
            Modules_Actions.enabled(id);
        } else {
            Modules_Actions.disabled(id);
        }
    }

    this.editClick = function editClick(id) {
        event.preventDefault();
        event.stopPropagation();
    }

    this.deleteClick = function editClick(id, name) {
        event.preventDefault();
        event.stopPropagation();

        Modules_Actions.remove(id, name);
    }

    this.search = function search() {
        $("#modules-pag-limit").change(function (e) {
            e.preventDefault();

            TableModules.serverSide(1);
        });

        $("#modules-pag-search").click(function (e) {
            e.preventDefault();

            var isFilter = ($(this).parent().find("input[name=search]").val() !== "");

            TableModules.setIsFilter(isFilter).serverSide(1);
        });
    };
});

var ModulesListado = new ClassModulesListado(jQuery, Base, CoreUI, Modules_Actions);