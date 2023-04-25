class Utils {

    constructor() {
    }

    irLogin() {
        window.location.href = constants.BASE_URL + 'auth/index';
    }

    irDashboard() {
        window.location.href = constants.BASE_URL + 'dashboard/index';
    }

    serverSide(url, method, fnSuccess, fnError) {
        var options = {
            url: url,
            method: method,
            success: fnSuccess,
            error: function (e) {
                if(typeof fnError === "function") {
                    fnError();
                } else {
                    var response = JSON.parse(e.responseText);
                    $.BasicMessage.error([response.messages]);
                }
            }
        };

        $.ajax(options);
    }
}

const utils = new Utils();