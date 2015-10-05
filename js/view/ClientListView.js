window.ClientListView = Backbone.View.extend({

    events: {
        "click #editButton": "edit",
        "click #deleteButton": "delete",
        "click #viewButton": "view"
    },

    initialize: function () {
        console.log('Initializing Client View');
    },

    render: function () {
        console.log('rendering client view');
        var me = this;
        var clients = new ClientCollection();
        clients.fetch({
            success: function (response) {
                console.log(response);
                $(me.el).html(me.template({clients: response.models}));
            }
        });
        return this;
    },

    edit: function(event) {
        console.log(event);
    },

    delete: function() {
        console.log('asdfasfasf');
    },

    view: function() {
        console.log('asdfasfasf');
    },

});
