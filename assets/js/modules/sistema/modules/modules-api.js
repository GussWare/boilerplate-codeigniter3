var ClassRolesApi = (function ($, Base) {

    var _this = this;

    this.create = function create(body, callback) {
        var url = Base.BASE_URL + "roles/create";

        Base.ajax(url, body, callback);
    }

    this.update = function update(body, callback) {
        var url = Base.BASE_URL + "roles/update";

        Base.ajax(url, body, callback);
    }

    this.enabled = function enabled(id, callback) {
        var url = Base.BASE_URL + "roles/enabled";

        Base.ajax(url, {id: id}, callback);
    }

    this.disabled = function disabled(id, callback) {
        var url = Base.BASE_URL + "roles/disabled";

        Base.ajax(url, {id: id}, callback);
    }

    this.remove = function remove(id, callback) {
        var url = Base.BASE_URL + "roles/delete";

        Base.ajax(url, {id: id}, callback);
    }
});

var Roles_Api = new ClassRolesApi(jQuery, Base);