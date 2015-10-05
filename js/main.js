$.ajaxSetup({
    statusCode: {
        401: function(){
            // Redirec the to the login page.
            window.location.replace('/#login');

        },
        403: function() {
            // 403 -- Access denied
            window.location.replace('/#denied');
        }
    }
});

$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
      if (o[this.name] !== undefined) {
          if (!o[this.name].push) {
              o[this.name] = [o[this.name]];
          }
          o[this.name].push(this.value || '');
      } else {
          o[this.name] = this.value || '';
      }
  });
  return o;
};

window.Router = Backbone.Router.extend({
    routes: {
        // Users
        "" : "login",
        "logout" : "logout",
        "logout": "logout",
        "listUsers" : "listUsers",

        // Clients
        "listClients" : "listClients",
        "addClient" : "editClient",
        "editClient/:id" : "editClient",
        "deleteClient/:id" : "deleteClient",
    },

    // Users
    loginPage: function() {
        window.location.replace('login.html');
    },
    login: function() {
        $('#content').html(new LoginView().render().el);
    },
    logout: function() {
        var loginView = new LoginView();
        loginView.logout();
        // $('#content').html(loginView.render().el);
    },
    listUsers: function() {
        $('#content').html(new UserListView().render().el);
    },
    // Clients
    listClients: function() {
        $('#content').html(new ClientListView().render().el);
    },
    editClient: function(id) {
        $('#content').html(new ClientEditView().render(id).el);
    },
    deleteClient: function(id) {
        new ClientEditView().deleteClient();
    },
});

templateLoader.load(["LoginView", "ClientListView", "ClientEditView", "UserListView"],
    function () {
        app = new Router();
        Backbone.history.start();
    }
);
