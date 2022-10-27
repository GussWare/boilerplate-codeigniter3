var Class_CoreUI_BasicTable = (function ($) {

    function makeTr(row) {
        var tr = $("<tr></tr>");

        if (row) {
            tr.attr("data-item", JSON.stringify(row));
        }

        return tr;
    }

    function makeTd(text, params) {
        var td = $("<td></td>");

        if (text) {
            td.html(text);
        }

        if (params) {
            $.each(params, function (key, param) {
                td.attr(key, param);
            });
        }

        return td;
    }

    this.template = function template(headers, data) {
        var html = [];
        var tr = null;
        var td = null;

        $.each(data, function (i, row) {
            tr = makeTr(row);
            $.each(headers, function (j, header) {
                $.each(row, function (key, item) {
                    if (header === key) {
                        td = makeTd(item);
                        td.appendTo(tr);
                        html.push(tr);
                    }
                });
            });
        });

        return html;
    };

    this.templateLoading = function templateLoading(colspan) {
        var tr = makeTr();
        var td = makeTd("Loading ...", {
            "colspan": colspan
        });

        td.appendTo(tr);

        return tr;
    };
});

var CoreUI_BasicTable = new Class_CoreUI_BasicTable(jQuery);