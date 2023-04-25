class Actions {

    constructor() {
        this.MODAL_ID = "#modal-form-actions";
        this.BTN_ADD_ACTION = "#btn-add-actions";
        this.BTN_CANCEL_ACTION = ".btn-actions-cancel";


        this.FORM_ID = "#form-actions";
        this.FORM_OBJ = null;


        this.BTN_SAVE = "#btn-actions-save";

        this.initList();
        this.initForm();
    }

    initList() {
        var self = this;

        $(self.BTN_ADD_ACTION).on('click', function (e) {
            e.preventDefault();

            self.showModal();
        });

        $(self.BTN_CANCEL_ACTION).on("click", function (e) {
            e.preventDefault();

            self.hideModal();
        })
    }

    showModal() {
        var self = this;

        $(self.MODAL_ID).modal('show');
    }

    hideModal() {
        var self = this;

        $(self.MODAL_ID).modal('hide');
    }

    initForm() {
        var self = this;
        var formOptions = optionsFormValidate.getOptions({
            rules: {
                "name": {
                    required: true,
                },
                "slug": {
                    required: true,
                },
                "description": {
                    required: true,
                }
            }
        });

        self.FORM_OBJ = $(self.FORM_ID).validate(formOptions);

        $(self.BTN_SAVE).on("click", function (e) {
            e.preventDefault();

            var valid = self.FORM_OBJ.valid();

            if (!valid)
                return;

            self.save();
        });
    }

    save() {
        var self = this;

        var name = $("#actions-name").val();
        var slug = $("#actions-slug").val();
        var description = $("#actions-description").val();

        var action = {
            id: _.now(),
            name: name,
            slug: slug,
            description: description
        };

        var tableActions = JSON.parse(tableJsonActions);
        tableActions.push(action);

        tableJsonActions = JSON.stringify(tableActions);
        console.log(tableJsonActions);
    }
}