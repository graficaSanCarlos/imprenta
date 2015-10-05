window.Client = Backbone.Collection.extend({
    url: 'api/www/client/edit.php'
});

window.ClientCollection = Backbone.Collection.extend({
    url: 'api/www/client/list.php'
});
