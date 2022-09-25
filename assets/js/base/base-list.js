var ClassBaseList = (function ($) {

    var options = {
        "sDom": '<"top"lf<"clear">>rt<"bottom"ip<"clear">',
        "bSort": true,
        "bPaginate": true,
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "iDisplayLength": 10,
        "bServerSide": true,
        "bProcessing": true,
        "aoColumns": [],
        "sAjaxSource": "",
        "fnServerData": function (sSource, aoData, fnCallback) {},
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {}
    };

    var ListDataTable = null;

    this.initList = function initList(params) {

        var table = params.table;

        $.merge(options, params.options);

        ListDataTable = $(table).dataTable(options);
    };

});


var baseList = new ClassBaseList(jQuery);