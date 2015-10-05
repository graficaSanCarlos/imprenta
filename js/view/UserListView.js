window.UserListView = Backbone.View.extend({

    events: {
        "click #editButton": "edit",
        "click #deleteButton": "delete",
        "click #viewButton": "view"
    },

    initialize: function () {
        console.log('Initializing user View');
    },

    render: function () {
        console.log('rendering user view');
        var me = this;
        var user = new UserCollection();
        user.fetch({
            success: function (response) {
                console.log(response);
                $(me.el).html(me.template({users: response.models}));
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
