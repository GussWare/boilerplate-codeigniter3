var ClassRolesActions = (function ($, Base, CoreUI, Roles_Api, Toast, SweetAlert, Swal) {

    var _this = this;

    this.enabled = function enabled(id, el) {
        Roles_Api.enabled(id, function(){
            Toast.success(Base.TEXT_ENABLED_REGISTER);
        });
    }

    this.disabled = function disabled(id, el) {
        Roles_Api.disabled(id, function(){
            Toast.success(Base.TEXT_DISABLED_REGISTER);
        });
    }
    
    this.remove = function remove (id, name) {
        SweetAlert.confirm(Base.TEXT_DELETE_CONFIRM_TITLE, Base.TEXT_DELETE_CONFIRM_QUESTION, function (response) {
            Roles_Api.remove(id, function () {
                Swal.fire('Deleted!', Base.TEXT_DELETE_ACTION_CONFIRM, 'success');

                TableRoles.serverSide(1);
            });
        });
    }
});

var Roles_Actions = new ClassRolesActions(jQuery, Base, CoreUI, Roles_Api, Toast, SweetAlert, Swal);