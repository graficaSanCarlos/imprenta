window.UserEditView = Backbone.View.extend({

    events: {
        "click #acceptButton": "accept",
        "click #cancelButton": "cancel",
        "click #deleteButton": "delete"
    },

    initialize: function () {
        console.log('Initializing user edit view');
    },

    render: function (id) {
        console.log('Rendering user edit view');
        console.log(id);
        $(this.el).html(this.template());
        return this;
    },

    accept: function (event) {
        console.log(event);
        console.log($(event.currentTarget).serializeObject());
    },

    cancel: function (event) {
        event.preventDefault();
        console.log('cancel');
    },

    delete: function (event) {
        event.preventDefault();
        console.log('delete');
    }
});
