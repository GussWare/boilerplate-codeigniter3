var ClassRolesListado = (function ($, Base, CoreUI, Roles_Actions, Roles_Api) {

    var _this = this;

    this.initListado = function initListado() {
        TableRoles = $("#table-roles").BasicTable({
            "testing": true,
            "pagesContainer": ".roles-pages-container",
            "template": CoreUI.BasicTable.template,
            "templateLoading": CoreUI.BasicTable.templateLoading,
            "templateRow": _this.templateRow,
            "serverSide": {
                "url": Base.BASE_URL + 'roles/pagination',
                "method": "GET",
                "advancedSearch": [
                    "#roles-advanced-search",
                    "#roles-frm-show",
                    "#roles-frm-search"
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
        switcher.find("#switcher-enabled-" + data.id).attr('onchange', 'roles.switcherChange(' + data.id + ')');
        tdHabilitado.html(switcher);

        // botones de acciones
        var btnEdit = CoreUI.Buttons.BtnEdit(data.id);
        btnEdit.attr('onclick', 'roles.editClick(' + data.id + ');')
        btnEdit.appendTo(tdActions);

        var btnDelete = CoreUI.Buttons.BtnDelete(data.id);
        btnDelete.attr('onclick', 'roles.deleteClick(' + data.id + ');')
        btnDelete.appendTo(tdActions);
    };

    this.switcherChange = function switcherChange(id) {
        var checked = $(event.target).is(':checked');

        if (checked) {
            Roles_Actions.enabled(id);
        } else {
            Roles_Actions.disabled(id);
        }
    }

    this.editClick = function editClick(id) {
        event.preventDefault();
        event.stopPropagation();
    }

    this.deleteClick = function editClick(id, name) {
        event.preventDefault();
        event.stopPropagation();

        Roles_Actions.remove(id, name);
    }

    this.search = function search() {
        $("#roles-pag-limit").change(function (e) {
            e.preventDefault();

            TableRoles.serverSide(1);
        });

        $("#roles-pag-search").click(function (e) {
            e.preventDefault();

            var isFilter = ($(this).parent().find("input[name=search]").val() !== "");

            TableRoles.setIsFilter(isFilter).serverSide(1);
        });
    };
});

var RolesListado = new ClassRolesListado(jQuery, Base, CoreUI, Roles_Actions, Roles_Api);