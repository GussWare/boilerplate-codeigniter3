class Modules {

    constructor(slug, actions) {
        this.FORM_ID = "#form-" + slug;
        this.FORM_OBJ = null;

        this.TABLE_ID = "#table-" + slug;
        this.TABLE_OBJ = null;


        this.slug = slug;
        this.actions = actions;
    }

    initForm() {
        var self = this;
        var formOptions = optionsFormValidate.getOptions({
            rules: {
                name: {
                    required: true,
                },
                slug: {
                    required: true,
                },
                description: {
                    required: true,
                },
                enabled: {
                    required: true,
                }
            }
        });

        self.FORM_OBJ = $(self.FORM_ID).validate(formOptions);

        $(self.FORM_ID).ajaxForm({
            method: "POST",
            beforeSubmit: function () {
                var valid = self.FORM_OBJ.valid();
                return valid;
            },
            success: function (response) {
                if(response.code === constants.CODE_TYPE_SUCCESS) {
                    window.location.href = constants.BASE_URL + self.slug + "/index";
                }
            },
            error: function (e) {
                var response = JSON.parse(e.responseText);
                $.BasicMessage.error([response.messages]);
            }
        });
    }

    initList() {
        var self = this;
        self.TABLE_OBJ = $(self.TABLE_ID).BasicPagination({
            serverSide: {
                apiUrl: constants.BASE_URL + self.slug +'/pagination',
                method: "GET",
                dataType: "json",
                timesleep: 1000,
                advancedSearch: null,
                extraData: null,
                fnEventsCallback: function(pagination) {
                    var trTable = pagination.find('tbody').find('tr');

                    $.each(trTable, function (key, tr) {
                        var btnEdit = $(tr).find('td').eq(5).find('a.btn-edit');
                        var btnDelete = $(tr).find('td').eq(5).find('a.btn-delete');

                        btnEdit.on('click', function (e) {
                            e.preventDefault();
                            e.stopPropagation();

                            alert("clic btn Edit")
                        });

                        btnDelete.on('click', function (e) {
                            e.preventDefault();
                            e.stopPropagation();

                            alert("clic btn Delete")
                        });                    
                    });
                }
            },
            pagination: {
                results: "results",
                maxBtnPagination: 6,
                textStart: "Inicio",
                textBack: "Atras",
                textNext: "Siguiente",
                textEnd: "Fin",
                textPagination: "Mostrando {0} resultados de {1} resgistros.",
                classButtonAction: ".item-go-page"
            },
            paginationId: 'table-' + self.slug,
            templateId: 'template-table-'+ self.slug,
            paginationTemplateId: 'template-pages-'+ self.slug,
            pagesContainerClass: 'container-pages-' + self.slug
        });
    }
}