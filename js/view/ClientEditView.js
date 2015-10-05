window.ClientEditView = Backbone.View.extend({

    events: {
        "click #acceptButton": "accept",
        "click #cancelButton": "cancel",
        "click #deleteButton": "delete"
    },

    initialize: function () {
        console.log('Initializing Client Edit View');
    },

    render: function (id) {
        console.log('ppppp');
        console.log(id);
        console.log('rendering client edit view');
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
