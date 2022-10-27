// https://pagination.js.org/
(function ($) {
    "use strict";

    var _options = {
        testing: false,
        pagesContainer: ".pages-container",
        pagination: {
            results: "results",
            maxBtnPagination: 6,
            textNext: "Siguiente",
            textAtras: "Atras",
            textFin: "Fin",
            textInicio: "Inicio",
            textDescPagination: "Mostrando {0} resultados de {1} resgistros."
        },
        serverSide: {
            url: null,
            advancedSearch: null,
            timesleep: null
        },
        template: null,
        templateLoading: null,
        templateRow: null,
        templatePagination: null
    };

    var _this = null;
    var _header = null;
    var _headers = [];
    var _th = [];
    var _body = null;
    var _colspanHeader = 0;
    var _pagination = null;
    var _page = 1;
    var _isFilter = false;

    $.fn.BasicTable = function (params) {
        $.extend(_options, params);
        _this = $(this);
        _this.serverSide = serverSide;
        _this.setIsFilter = setIsFilter;

        init();

        return _this;
    };

    function setIsFilter(isFilter) {
        _isFilter = isFilter;

        return _this;
    }


    function init() {
        _header = _this.find("thead");
        _body = _this.find("tbody");

        _pagination = $(_options.pagesContainer);

        _th = _header.find("tr").find("th");

        $.each(_th, function (key, element) {
            var dataName = $(element).attr("data-name");

            if (dataName) {
                _headers.push(dataName);
            }

            _colspanHeader++;
        });

        serverSide();
    }

    function clearBody() {
        _body.html('');

    }

    function clearPagnation() {
        _pagination.html('');
    }

    function serverSide(page) {
        var data = getDataAjax(page);
        var timesleep = _options.serverSide.timesleep;

        $.ajax({
            type: "GET",
            url: _options.serverSide.url,
            data: data,
            dataType: "JSON",
            beforeSend: function () {
                clearBody();

                var html = _options.templateLoading(_colspanHeader);

                html.appendTo(_body);
            },
            success: function (response) {
                setTimeout(function () {
                    makeDataPagination(response);
                }, timesleep);
            },
            complete: function () {
                console.log("Ya completo todo we :v ");
            },
            error: function () {
                console.log("BasicTable - Ajax Error ...");
            }
        });

        return _this;
    }

    function makeDataPagination(response) {
        clearBody();

        var html = _options.template(_headers, response[_options.pagination.results]);

        $.each(html, function (key, tr) {
            tr.appendTo(_body);

            if (typeof _options.templateRow === "function") {
                _options.templateRow(tr);
            }
        });

        makePagination(response.page, response.limit, response.totalPages, response.totalRegister, response.totalResults, response.sortBy);
    }

    function getDataAjax(page) {
        var data = {};
        var formSerialize = [];

        if (typeof _options.serverSide.advancedSearch === "function") {
            data = _options.serverSide.advancedSearch();
        } else {
            $.each(_options.serverSide.advancedSearch, function (key, form) {
                formSerialize = $(form).serializeArray();
                $.each(formSerialize, function (k, input) {
                    data[input.name] = input.value;
                });
            });
        }

        if (page) {
            _page = page;
        }

        data.page = _page;

        return data;
    }

    function makePagination(page, limit, totalPages, totalRegister, totalResults, sortBy) {
        clearPagnation();

        if (typeof _options.templatePagination === "function") {
            _options.templatePagination(page, limit, totalPages, totalResults, sortBy);
        } else {
            makeButtonsPagination(page, totalPages, totalRegister, totalResults, limit);
        }
    }

    function makeButtonsPagination(page, totalPages, totalRegister, totalResults, limit) {

        $.each(_pagination, function (key, pagination) {
            var pageBack = null;
            var pageNext = null;
            var numButtons = Math.floor(_options.pagination.maxBtnPagination / 2);
            var disableBtnBack = false;
            var disableBtnNext = false;
            var activeBtnAtras = false;
            var activeBtnNext = false;

            if (page === 1 && page === totalPages) {
                pageBack = 1;
                pageNext = 1;

                disableBtnBack = true;
                disableBtnNext = true;

            } else if (page > 1 && page === totalPages) {
                pageBack = totalPages - _options.pagination.maxBtnPagination;

                if (pageBack < 1) {
                    pageBack = 1;
                }

                pageNext = totalPages;

                disableBtnBack = false;
                disableBtnNext = true;

            } else if (page >= 1 && page <= totalPages) {
                pageBack = page - numButtons;
                pageNext = page + numButtons;

                if (pageBack < 1) {
                    pageBack = 1;
                }

                if (pageNext > totalPages) {
                    pageNext = totalPages;
                }

                disableBtnBack = false;
                disableBtnNext = false;

            }

            var row = $("<div></div>").addClass("row");
            row.appendTo(pagination);

            var divDesc = $("<div></div>").addClass("col-md-6");
            var divPag = $("<div></div>").addClass("col-md-6");

            divDesc.html(textDescPagination(totalRegister, totalResults, limit)).appendTo(row);
            divPag.appendTo(row);

            var nav = makeNav();
            nav.appendTo(divPag);

            var ul = makeUl();
            ul.appendTo(nav);

            var btnInicio = makeLi(_options.pagination.textInicio, 1, false, disableBtnBack, 'item-go-page item-start');
            btnInicio.appendTo(ul);

            var btnAtras = makeLi(_options.pagination.textAtras, null, false, disableBtnBack, 'item-back');
            btnAtras.appendTo(ul);

            var btn = null;
            var disableBtn = false;
            for (var i = pageBack; i <= pageNext; i++) {
                disableBtn = (parseInt(page) === parseInt(i));

                btn = makeLi(i, i, disableBtn, disableBtn, 'item-go-page');
                btn.appendTo(ul);
            }

            var btnNext = makeLi(_options.pagination.textNext, null, false, disableBtnNext, 'item-next');
            btnNext.appendTo(ul);

            var btnFin = makeLi(_options.pagination.textFin, totalPages, false, disableBtnNext, 'item-go-page item-end');
            btnFin.appendTo(ul);
        });

        observerPagination();
    }

    function observerPagination() {
        var btnGoPage = _pagination.find("ul").find("li.item-go-page");

        btnGoPage.on("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            var page = $(this).attr("data-page");

            _page = page;

            serverSide();
        });


        var btnBack = _pagination.find("ul").find("li.item-back");
        btnBack.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            var btnStart = _pagination.find("ul").find("li.item-start");
            var page = btnStart.attr("data-page");

            _page = ((parseInt(_page) - 1) < page) ? page : parseInt(_page) - 1;

            serverSide();
        });

        var btnNext = _pagination.find("ul").find("li.item-next");
        btnNext.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            var btnEnd = _pagination.find("ul").find("li.item-end");
            var page = btnEnd.attr("data-page");

            _page = ((parseInt(_page) + 1) > page) ? page : parseInt(_page) + 1;

            serverSide();
        });
    }

    function makeNav() {
        var nav = $("<nav></nav>");
        return nav;
    }

    function makeUl() {
        var ul = $("<ul></ul>").addClass("pagination justify-content-end");
        return ul;
    }

    function makeLi(text, page, active, disabledBtn, css) {
        var li = $("<li></li>")
            .addClass("page-item");

        if (page) {
            li.attr("data-page", page);
        }

        if (active) {
            li.addClass("active");
        }

        if (disabledBtn) {
            li.addClass("disabled");
        }

        if (css) {
            li.addClass(css);
        }

        var btn = $("<a></a>")
            .attr("href", "javascript:void(0)")
            .addClass("page-link")
            .html(text);

        btn.appendTo(li);

        return li;
    }

    function textDescPagination(totalRegister, totalResults, limit) {
        var text = _options.pagination.textDescPagination;

        if (_isFilter) {
            text = text.replace('{0}', totalRegister);
            text = text.replace('{1}', totalResults);
        } else {
            text = text.replace('{0}', limit);
            text = text.replace('{1}', totalResults);
        }

        return text;
    }

})(jQuery)