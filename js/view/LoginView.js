window.LoginView = Backbone.View.extend({

    initialize:function () {
        console.log('Initializing Login View');
    },

    events: {
        "click #loginButton": "login"
    },

    render:function () {
        $(this.el).html(this.template());
        return this;
    },

    login:function (event) {
        event.preventDefault(); // Don't let this button submit the form
        $('.alert-danger').hide(); // Hide any errors on a new submit
        var url = 'api/www/user/login.php';
        console.log('Loggin in... ');
        var formValues = {
            username: $('#inputUsername').val(),
            password: $('#inputPassword').val()
        };
        var me = this;
        var loginModel = new LoginModel();
        loginModel.fetch({
            type: 'POST',
            data: formValues,
            dataType: "json",
            success:function (response) {
                console.log(["Login request details: ", response]);
                console.log(response.get('statusCode'));
                if(response.get('statusCode')) {  // If there is an error, show the error messages
                    $('#errorMessage').text(response.get('data').message);
                    $('.alert-danger').show();
                } else { // If not, send them back to the home page
                    window.location.replace('index.html#listClients');
                }
            }
        });
        return this;
    },

    logout:function () {
        console.log('Loggin out... ');
        $('.alert-error').hide(); // Hide any errors on a new submit
        var url = 'api/www/user/logout.php';
        $.ajax({
            url: url,
            type: 'GET',
            success:function (response) {
                window.location.replace('login.html');
            }
        });
        return this;
    }
});
